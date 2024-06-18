<?php


namespace App\Http\Controllers\Web;

//use App\Models\Category;
//use App\Models\InfoSection;
use App\Models\Page;
//use App\Models\SimpleSlide;
//use App\Services\Web\HomePageService;
use Illuminate\Http\Request;
//use Modules\ImportantChanges\Entities\ImportantChange;
//use Modules\Consultations\Entities\Consultation;
//use Modules\CheatSheets\Entities\CheatSheet;
use Modules\Articles\Entities\Article;
//use Modules\Videos\Entities\Video;
//use App\DataClasses\InfoSectionIconClass;

class HomeController
{

    /**
     * @var HomePageService
     */
//    private HomePageService $service;

    /**
     * HomeController constructor.
     * @param HomePageService $service
     */
    /*public function __construct(HomePageService $service)
    {
        $this->service = $service;
    }*/

    public function index(Request $request, Page $page)
    {
        return view('web.home.show');
    }

}
