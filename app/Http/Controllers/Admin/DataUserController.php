<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model_Penjual\Penjual;
use App\Model_Pembeli\Pembeli;

class DataUserController extends Controller
{
    
    public function penjual(){

        $penjual = Penjual::all();
        
        return view('admin.datauser.penjual',compact('penjual'));
    }

    public function pembeli(){

        $pembeli = Pembeli::all();

        return view('admin.datauser.pembeli',compact('pembeli'));
    }
}
