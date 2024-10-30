<?php

namespace App\Console\Commands;

use App\Jobs\SitemapGenerateJob;
use App\Models\Page;
use App\Services\Sitemap\SitemapService;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap for the website';

    public function handle()
    {
        resolve(SitemapService::class)->generate();
        dd(123);
        try {
            SitemapGenerateJob::dispatch();
            $this->info('Sitemap generated successfully.');
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }
    }
}
