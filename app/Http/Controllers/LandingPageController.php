<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lahan;

class LandingPageController extends Controller
{
    public function index()
    {
        $lahan = Lahan::all();
        return view('landingpage',compact('lahan'));
    }
}
