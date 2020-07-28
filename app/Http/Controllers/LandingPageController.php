<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lahan;

class LandingPageController extends Controller
{
    public function index()
    {
        $lahan = Lahan::where('status_lahan', 1)->where('status_jual', 0)->get();
        return view('landingpage',compact('lahan'));
    }
}
