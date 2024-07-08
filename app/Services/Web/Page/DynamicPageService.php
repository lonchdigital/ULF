<?php

namespace App\Services\Web\Page;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Contracts\Page\DynamicPage;
use Illuminate\View\View;
use Modules\Articles\Entities\ArticlePage;
use Modules\Cars\Models\CarPage;

class DynamicPageService implements DynamicPage
{
    public function index(Request $request): View
    {
        $page = Page::where('section', 'main')->first() ?? new Page;

        return $this->call($request, $page);
    }

    public function section(Request $request, string $section): View
    {
        if($section === 'articles') {
            $page = ArticlePage::where('active', true)
                    ->where('section', $section)
                    ->where('slug', $section)
                    ->first() ?? new ArticlePage;

        } elseif ($section === 'cars') {
            $page = CarPage::where('active', true)
                    ->where('section', $section)
                    ->where('slug', $section)
                    ->first() ?? new CarPage;
        }

        return $this->call($request, $page);
    }

    public function slug(Request $request, string $section, string $slug): View
    {
        if($section === 'articles') {
            $page = ArticlePage::where('article_pages.active',true)
                    ->where('section', $section)
                    ->where('slug', $slug)
                    ->first() ?? new ArticlePage;

        } elseif ($section === 'cars') {
            $page = CarPage::where('car_pages.active',true)
                    ->where('section', $section)
                    ->where('slug', $slug)
                    ->first() ?? new CarPage;
        }

        return $this->call($request, $page);
    }

    private function call(Request $request, ArticlePage|CarPage $page): View
    {
        if (!$page->exists) {
            abort(404, __('web.error_404'));
        }

        $action = $page->getAttribute('action');
        $controller = $page->getAttribute('controller');

        return app($controller)->$action($request, $page);
    }
}
