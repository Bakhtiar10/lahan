<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SurveiPenjualController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:penjual');
    }

    public function index()
    {
        return view('penjual.datasurvei.index',compact('surveipenjual'));
    }
}
