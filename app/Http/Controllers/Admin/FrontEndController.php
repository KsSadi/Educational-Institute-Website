<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use App\Models\Speech;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function home()
    {
        $theme = GlobalSetting::first()->theme;
        if($theme == '1') {
            $speech = Speech::first();
            $notices = \App\Models\Notice::orderBy('date', 'desc')->take(5)->get();
            $sliders = \App\Models\Slider::all();
            return view('frontend.theme1.home',compact('speech','notices','sliders'));
        }elseif ($theme == '2') {
            dd("Theme 2");
        }elseif ($theme == '3') {
            dd("Theme 3");
        }


    }
}
