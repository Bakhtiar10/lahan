<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Penjual;
use App\Lahan;
use App\Pembeli;
use App\User;
use App\Exports\PembeliExport;
use PDF;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $penjual = Penjual::all();
        $pembeli = Pembeli::all();

        return view('admin.beranda.index',  compact('penjual','pembeli'));
    }

    public function chart()
    {
            // $lahan = Lahan::all();
            // $penjual = Penjual::all();
            $data = Pembeli::all();
     
        return response()->json($data);

    }

}
