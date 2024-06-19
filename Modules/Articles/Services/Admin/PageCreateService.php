<?php


namespace Modules\Articles\Services\Admin;


use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Modules\Articles\Entities\Article;
use Modules\Articles\Http\Controllers\Web\ArticlesController;

class PageCreateService
{
    public function create(Article $document, array $data): void
    {
        $page = new Page;

        $section = config('articles.section');

        $parentPage = Page::where('page_id', null)->where('section', $section)->first();

        $page->setAttribute('name', $document->getAttribute('name'));

        $page->setAttribute('title', $data['meta_title']);
        $page->setAttribute('meta_description', $data['meta_desc']);

        $page->setAttribute('controller', ArticlesController::class);
        $page->setAttribute('action', config('articles.new_document_action'));

        $page->setAttribute('section', $section);
        $page->setAttribute('slug', $this->generateSlug($page));

        $page->setAttribute('pageable_type', Article::class);
        $page->setAttribute('pageable_id', $document->getAttribute('id'));

        if ($parentPage) {
            $page->setAttribute('page_id', $parentPage->getAttribute('id'));
        }

        $page->setAttribute('is_available', isset($data['is_available']));
        $page->setAttribute('is_user_available', isset($data['is_user_available']));

        $publishAt = Carbon::createFromFormat('d.m.Y H:i', $data['publish_date'] . ' ' . $data['publish_time']);
        $page->setAttribute('publish_at', $publishAt);

        $page->save();
    }

    public function updatePageSlug(Page $page): void
    {
        $page->slug = $this->generateSlug($page);
        $page->save();
    }

    private function generateSlug(Page $page): string
    {
        $slug = Str::slug($page->getAttribute('name'));
        $hasSlug = Page::where('slug', $slug)->exists();

        if ($hasSlug) {
            $slug = $slug . '-' . uniqid();
        }

        return $slug;
    }
}
