<?php


namespace Modules\Articles\Services\Admin;


use App\Models\Document;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Modules\Articles\Entities\Article;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

final class ArticleCreateService extends ArticleBaseService
{
    public function make(array $data): Article
    {
        $document = $this->createDocument();

        $article = $this->createArticleDocument($document, $data);

        $this->pageService->create($article, $data);

        return $article;
    }

    private function createDocument(): Document
    {
        $document = new Document;

        $document->setAttribute('type', Article::class);
        $document->save();

        return $document;
    }

    private function createArticleDocument(Document $document, array $data): Article
    {
        $article = new Article;

        $article->setAttribute('name', $data['name']);

        $preview_image_path = 'articles-images/'  . sha1(time()) . '_' . Str::random(6) . '.jpg';
        $image = Image::make($data['preview_image'])->encode('jpg', 100);
        if( Storage::disk(config('app.images_disk_default'))->put($preview_image_path, $image) ) {
            $article->setAttribute('preview_image', $preview_image_path);
        }

        $article->setAttribute('short_desc', $data['short_desc']);
        $article->setAttribute('content', $data['content']);

        $article->setAttribute('document_id', $document->getAttribute('id'));
        $article->setAttribute('document_date', Carbon::createFromFormat('d.m.Y', $data['document_date']));
        $article->setAttribute('consultation_author_id', $data['author']);

        if ($data['content'] && $data['name']) {
            $this->fileService->contentToFile($data['content'], config('articles.section'), $data['name']);
        }

        $article->save();

        $document->setAttribute('with_layouts', isset($data['with_layouts']));
        $document->setAttribute('entity_id', $article->getAttribute('id'));
        $document->save();

        return $article;
    }

}
