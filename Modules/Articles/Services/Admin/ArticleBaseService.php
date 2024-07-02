<?php

namespace Modules\Articles\Services\Admin;


class ArticleBaseService
{
    /**
     * @var PageCreateService
     */
    protected PageCreateService $pageService;

    public function __construct(PageCreateService $pageService)
    {
        $this->pageService = $pageService;
    }
}
