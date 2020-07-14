<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SurveiLahanController extends Controller
{
    public function index()
    {
        return view('admin.datasurvei.index',compact('survei'));
    }
}
