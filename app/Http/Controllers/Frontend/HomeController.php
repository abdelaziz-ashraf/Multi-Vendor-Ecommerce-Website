<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $sliders = Slider::whereStatus('active')->orderBy('serial', 'asc')->get();
        return view('frontend.home.index', compact('sliders'));
    }
}
