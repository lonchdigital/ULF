<?php

namespace App\Console\Commands;

use App\Jobs\SitemapGenerateJob;
use App\Models\Page;
use App\Models\PageBlock;
use App\Services\Sitemap\SitemapService;
use Illuminate\Console\Command;

class FixFooterLogoCommand extends Command
{
    protected $signature = 'fix:footer';
    protected $description = 'Fix footer logo';

    public function handle()
    {
        PageBlock::where('block', 'footer')
        ->where('key', 'facebook')
        ->first()
        ->update([
            'value' => null,
        ]);

        PageBlock::where('block', 'footer')
        ->where('key', 'instagram')
        ->first()
        ->update([
            'value' => null,
        ]);
    }
}
