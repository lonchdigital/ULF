<?php

namespace Modules\Articles\Services\Admin;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Modules\Articles\Entities\Article;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

final class ArticleUpdateService extends ArticleBaseService
{
    public function make(Article $document, array $data): void
    {
        $document = $this->updateDocument($document, $data);

        $this->setPage($document, $data);
    }

    private function updateDocument(Article $document, array $data): Article
    {
        $document->setAttribute('name', $data['name']);

        if(isset($data['preview_image'])) {
            $preview_image_old = $document->preview_image;

            $preview_image_path = 'articles-images/'  . sha1(time()) . '_' . Str::random(6) . '.jpg';
            $image = Image::make($data['preview_image'])->encode('jpg', 100);
            if( Storage::disk(config('app.images_disk_default'))->put($preview_image_path, $image) ) {
                $document->setAttribute('preview_image', $preview_image_path);

                if (Storage::disk(config('app.images_disk_default'))->exists($preview_image_old)) {
                    Storage::disk(config('app.images_disk_default'))->delete($preview_image_old);
                }
            }

        }

        $document->setAttribute('short_desc', $data['short_desc']);
        $document->setAttribute('content', $data['content']);
        $document->setAttribute('document_date', Carbon::createFromFormat('d.m.Y', $data['document_date']));
        $document->setAttribute('consultation_author_id', $data['author']);

        if ($data['content'] && $data['name']) {
            $this->fileService->contentToFile($data['content'], config('articles.section'), $data['name']);
        }

        $document->save();

        $document->document->update([
            'with_layouts' => isset($data['with_layouts'])
        ]);

        return $document;
    }

    private function setPage(Article $document, array $data): void
    {
        $page = $document->getAttribute('page');

        if ($page) {
            $publishAt = \Carbon\Carbon::createFromFormat('d.m.Y H:i', $data['publish_date'] . ' ' . $data['publish_time']);
            $page->setAttribute('publish_at', $publishAt);

            $page->setAttribute('title', $data['meta_title']);
            $page->setAttribute('meta_description', $data['meta_desc']);

            $page->setAttribute('is_available', isset($data['is_available']));
            $page->setAttribute('is_user_available', isset($data['is_user_available']));
            $page->save();
        } else {
            $this->pageService->create($document, $data);
        }
    }

}
