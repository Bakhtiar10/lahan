<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SurveiPembeliController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:pembeli');
    }

    public function index()
    {
        return view('pembeli.datasurvei.index',compact('surveipembeli'));
    }
}
