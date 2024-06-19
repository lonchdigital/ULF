<?php


namespace Modules\Articles\Services\Admin;


use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Modules\Articles\Entities\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArticlesService extends ArticleBaseService
{
    /**
     * @var ArticleCreateService
     */
    private ArticleCreateService $createService;
    /**
     * @var ArticleUpdateService
     */
    private ArticleUpdateService $updateService;

    public function __construct(ArticleCreateService $createService, ArticleUpdateService $updateService)
    {
        $this->createService = $createService;
        $this->updateService = $updateService;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getDocuments(array $data = []): LengthAwarePaginator
    {
        $query = Article::query()->filter($data)->latest();

        return $query->paginate(10);
    }

    /**
     * @param array $data
     * @return Article
     */
    public function createDocument(array $data): Article
    {
        return $this->createService->make($data);
    }

    /**
     * @param Article $document
     * @param array $data
     */
    public function updateDocument(Article $document, array $data): void
    {
        $this->updateService->make($document, $data);
    }

    /**
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return Category::where('parent_id', 0)->get();
    }

    /**
     * @param Article $document
     * @return string|null
     */
    public function getFilePath(Article $document): string|null
    {
        $filePath = null;

        $documentFile = $document->document->documentFile;

        if ($documentFile) {
            $filePath = $documentFile->file->path;
        }

        return $filePath;
    }

    /**
     * @param Article $document
     */
    public function removeDocument(Article $document): void
    {
        if ($document->document && $document->document->documentFile) {
            $documentFile = $document->document->documentFile;

            if ($documentFile->file) {
                $documentFile->file->delete();
            }

            $documentFile->delete();
        }

        $document->document->delete();

        $document->page->delete();

        if (Storage::disk(config('app.images_disk_default'))->exists($document->preview_image)) {
            Storage::disk(config('app.images_disk_default'))->delete($document->preview_image);
        }

        $document->delete();
    }

    public function searchArticlePosts(array $request): array
    {
        $query = Article::query();

        if( !is_null($request['excludeArticleIds']) ) {
            $excludeArticleIds = explode(",", $request['excludeArticleIds']);
            $query->whereNotIn('id', $excludeArticleIds);
        }

        if( !is_null($request['search']) ) {
            $searchTerm = str_replace(' ', '\s*', $request['search']);
            $searchTerm = preg_replace('/\s+/', ' ', $searchTerm);
            $query->where('name', 'REGEXP', '.*' . $searchTerm . '.*');
        }

        return [
            'documents' => $query->select(['id', 'name'])->limit(6)->get()
        ];
    }
}
