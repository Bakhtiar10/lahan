<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model_Pembeli\Pembeli;
use App\Model_Penjual\Penjual;
use App\Model_Penjual\Lahan;
use App\User;

class PembeliController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:pembeli');
    }

    public function index()
    {
        $lahan = Lahan::where('status_lahan', 1)->where('status_jual',0)->get();
        return view('pembeli.beranda.index',compact('lahan'));
    }
}