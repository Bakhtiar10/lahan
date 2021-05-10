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
        $this->middleware('auth');
    }


    public function index()
    {
        $penjual = User::where('role_id', 2)->get();
        $pembeli = User::where('role_id', 3)->get();

        return view('admin.beranda.index',  compact('penjual','pembeli'));
    }

    

}
