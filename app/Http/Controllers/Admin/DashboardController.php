<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Cars\Models\Car;
use Modules\Cars\Models\Type;
use Modules\Cars\Models\Vehicle;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect()->route('page.index');
    }

    public function test(){
        $test = Type::find(1);
        dd($test);
        $test->delete();
    }

}
