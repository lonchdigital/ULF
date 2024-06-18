<?php


namespace Modules\Articles\Services\Web;

use App\Models\Document;
use App\Models\File;
use App\Models\Page;
use App\Services\Web\HtmlParserService;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\DocumentCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Modules\Articles\Entities\Article;
use Illuminate\Http\Request;
use Modules\Consultations\Entities\Consultation;
use Modules\Videos\Entities\Video;

class WebService
{
    const PER_PAGE = 10;

    /**
     * @var HtmlParserService
     */
    private HtmlParserService $parserService;

    public function __construct(HtmlParserService $parserService)
    {
        $this->parserService = $parserService;
    }

    /**
     * @param Page $page
     * @return Collection
     */
    public function getHtmlDocument(Page $page): Collection
    {
        $file = $page->getAttribute('file');

        if ($file && $file->getAttribute('path')) {
            return $this->parserService->getHtmlCollection($file);
        }

        return new Collection();
    }

    public function getCategories()
    {
        $ids = Article::whereHas('document', function ($query){
            $query->has('documentCategory');
        })->pluck('document_id');

        $categories_ids = DocumentCategory::whereIn('document_id', $ids)->get()->pluck('category_id')->unique();
        $categoriesWithPosts = Category::whereIn('id', $categories_ids)->get();

        // Get all parent categories
        $allParentCategoryIds = $this->getAllParentCategoryIds($categoriesWithPosts);
        $allParentCategories = Category::whereIn('id', $allParentCategoryIds)->get();

        // Merge categories with posts and all parent categories
        $allCategories = $categoriesWithPosts->merge($allParentCategories);

        // Get the hierarchical structure
        $hierarchicalCategories = $this->getParentCategories($allCategories);

        return $hierarchicalCategories;
    }

    private function getAllParentCategoryIds($categories)
    {
        $allParentCategoryIds = [];

        foreach ($categories as $category) {
            $parentId = $category->parent_id;

            while ($parentId !== null && !in_array($parentId, $allParentCategoryIds)) {
                $allParentCategoryIds[] = $parentId;
                $parentCategory = Category::find($parentId);
                $parentId = $parentCategory ? $parentCategory->parent_id : null;
            }
        }

        return $allParentCategoryIds;
    }

    private function getParentCategories($categories, $parentId = 0)
    {
        $result = new Collection();

        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $category->children = $this->getParentCategories($categories, $category->id);
                $result->push($category);
            }
        }

        return $result;
    }

    public function getFilteredPosts(Request $request): array
    {
        $query = Article::query()
            ->whereHas('page', fn($query) => $query->published())
            ->orderByDesc('document_date')
            ->latest();

        if( !is_null( $request['selectedCats'] ) ) {
            $all_document_ids = [];
            $selectedCats = Category::whereIn('id', $request['selectedCats'])->get();

            foreach ($selectedCats as $cat) {
                $all_document_ids = array_merge($all_document_ids, $cat->documentCategories->pluck('document_id')->toArray());
            }

            $query->whereIn('document_id', $all_document_ids);
        }

        if( !is_null($request['search']) ) {
            $searchTerm = str_replace(' ', '\s*', $request['search']);
            $searchTerm = preg_replace('/\s+/', ' ', $searchTerm);
            $query->where('name', 'REGEXP', '.*' . $searchTerm . '.*');
        }

        // pagination
        $requestPage = $request['pageNumber'] !== null ? (int) $request['pageNumber'] : 1;
        $currentPage = $request->input('page', $requestPage); // Current page

        $postTypeDocuments = $query->paginate(self::PER_PAGE, ['*'], 'page', $currentPage)->onEachSide(0);
        $postTypeItems = $postTypeDocuments->items();

        $results = new LengthAwarePaginator($postTypeDocuments->items(), $postTypeDocuments->total(), self::PER_PAGE, $currentPage);
        $results->onEachSide(0);
        $results->setPath($request->fullUrl());
        $paginationHtml = $results->onEachSide(3)->links('vendor.pagination.default')->toHtml();

        $postTypeDocuments = $this->getDocumentsAdditional($postTypeItems, asset('img/icon-pdf.svg'));


        return [
            'paginationHTML' => $paginationHtml,
            'documents' => $postTypeDocuments,
        ];
    }

    private function getDocumentsAdditional($documents, $svgPath)
    {
        foreach ($documents as $document) {
            $document['doc_additional'] = [
                'document_date' => ( !is_null($document->document_date) ) ? $document->document_date->format('d.m.Y') : '',
                'type_name' => $document->type->name ?? '',
                'doc_url' => route('slug.page', ['section' => $document->page->section, 'slug' => $document->page->slug]),
                'svg_path' => $svgPath
            ];
        }

        return $documents;
    }

    public function getConsultations(): \Illuminate\Database\Eloquent\Collection
    {
        return Consultation::query()->orderByDesc('created_at')->limit(5)->get();
    }

    public function isFavoriteActive(Document $document, $user): bool
    {
        $favorite = $document->favorite;
        return $user && $favorite && $user->getAttribute('id') === $favorite->getAttribute('user_id');
    }

    public function getVideos($cat_ids): \Illuminate\Database\Eloquent\Collection
    {
        $query = Video::query();

        if( !is_null( $cat_ids ) ) {
            $all_document_ids = [];
            $selectedCats = Category::whereIn('id', $cat_ids)->get();

            foreach ($selectedCats as $cat) {
                $all_document_ids = array_merge($all_document_ids, $cat->documentCategories->pluck('document_id')->toArray());
            }

            $query->whereIn('document_id', $all_document_ids);
        }

        return $query->orderByDesc('created_at')->limit(4)->get();
    }

    public function getEditorDownloadLink(Article $document): string
    {
        if (userHasDemo()) {
            return '';
        }

        $storageFolderName = 'editor-pdf';
        $parentSlug = config('articles.section');

        $path = "$storageFolderName/" .  "$parentSlug/" . $document->getAttribute('name');
        $path .= $document->document->getAttribute('with_layouts') ? '__.pdf' : '.pdf';

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        return '';
    }
}
