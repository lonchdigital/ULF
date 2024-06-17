<?php

namespace App\Contracts\Page;

use Illuminate\Http\Request;
use Illuminate\View\View;

interface DynamicPage
{
    public function index(Request $request): View;

    public function section(Request $request, string $section): View;

    public function slug(Request $request, string $section, string $slug): View;
}
