<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use\App\Survei;

class SurveiPenjualController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:penjual');
    }

    public function index()
    {
        $survei = Survei::where('status_survei', 1)->get();
        return view('penjual.datasurvei.index',compact('survei'));
    }
}
