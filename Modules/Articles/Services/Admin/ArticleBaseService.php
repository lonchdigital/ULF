<?php

namespace Modules\Articles\Services\Admin;


use App\Services\Admin\File\FileService;

class ArticleBaseService
{
    /**
     * @var PageCreateService
     */
    protected PageCreateService $pageService;
    /**
     * @var FileService
     */
    protected FileService $fileService;

    public function __construct(PageCreateService $pageService, FileService $fileService)
    {
        $this->pageService = $pageService;
        $this->fileService = $fileService;
    }
}
