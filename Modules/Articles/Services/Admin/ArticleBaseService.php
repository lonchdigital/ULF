<?php

namespace Modules\Articles\Services\Admin;


class ArticleBaseService
{
    /**
     * @var PageService
     */
    protected PageService $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }
}
