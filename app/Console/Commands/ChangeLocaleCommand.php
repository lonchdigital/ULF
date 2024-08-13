<?php

namespace App\Console\Commands;

use App\Models\AutomatchTranslation;
use App\Models\CarDriveBlockTranslation;
use App\Models\CommonCarSettingTranslation;
use App\Models\FaqTranslation;
use App\Models\HomeBenefitBlockTranslation;
use App\Models\HomeDriveBlockTranslation;
use App\Models\HomeMainBlockTranslation;
use App\Models\PageBlockTranslation;
use App\Models\PageTranslation;
use App\Models\SubscribeBenefitTranslation;
use App\Models\SubscribeSettingTranslation;
use Illuminate\Console\Command;
use Modules\Articles\Models\ArticlePageTranslation;
use Modules\Articles\Models\ArticleTranslation;
use Modules\Cars\Models\AdvertisementCityTranslation;
use Modules\Cars\Models\CarFaqTranslation;
use Modules\Cars\Models\CarPageTranslation;
use Modules\Cars\Models\CarTranslation;
use Modules\Cars\Models\ColorTypeTranslation;
use Modules\Cars\Models\DriverTypeTranslation;
use Modules\Cars\Models\FuelTypeTranslation;
use Modules\Cars\Models\RegionTranslation;
use Modules\Cars\Models\SubscriptionPeriodTranslation;
use Modules\Cars\Models\TransmissionTypeTranslation;
use Modules\Cars\Models\TypeTranslation;
use Modules\Clients\Models\ClientTranslation;

class ChangeLocaleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:change-locale-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        AdvertisementCityTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        ArticlePageTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        ArticleTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        AutomatchTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        CarDriveBlockTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        CarFaqTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        CarPageTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        CarTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        ClientTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        ColorTypeTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        CommonCarSettingTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        DriverTypeTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        FaqTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        FuelTypeTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        HomeBenefitBlockTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        HomeDriveBlockTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        HomeMainBlockTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        PageBlockTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        PageTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        RegionTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        SubscribeBenefitTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        SubscribeSettingTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        SubscriptionPeriodTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        TransmissionTypeTranslation::where('locale', 'uk')->update(['locale' => 'ua']);
        TypeTranslation::where('locale', 'uk')->update(['locale' => 'ua']);

        $this->info('All Done Well!');
    }
}
