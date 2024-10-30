<?php

namespace App\Jobs;

use App\Services\Sitemap\SitemapService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SitemapGenerateJob implements ShouldQueue
{
    use Queueable;

    private SitemapService $sitemapService;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->sitemapService = app(SitemapService::class);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->sitemapService->generate();
    }
}
