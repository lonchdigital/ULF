<?php


namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Contracts\Page\DynamicPage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class DynamicPageController extends BaseController
{
    public function index(Request $request, DynamicPage $dynamicPage): View
    {
        return $dynamicPage->index($request);
    }

    public function section(Request $request, DynamicPage $dynamicPage, string $section): View
    {
        return $dynamicPage->section($request, $section);
    }

    public function slug(Request $request, DynamicPage $dynamicPage, string $section, string $slug): View
    {
        return $dynamicPage->slug($request, $section, $slug);
    }

}
