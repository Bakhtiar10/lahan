<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model_Penjual\Penjual;
use App\User;

class PenjualController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:penjual');
    }

    public function index()
    {
        return view('penjual.beranda.index');
    }
}
