<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutomatchController extends Controller
{
    public function index()
    {
        return view('admin.automatch.index');
    }

    public function feedbacksIndex()
    {
        return view('admin.automatch.feedbacks-index');
    }
}
