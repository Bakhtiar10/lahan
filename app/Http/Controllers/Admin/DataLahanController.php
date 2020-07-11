<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model_Penjual\Penjual;
use App\Model_Penjual\Lahan;
use App\Model_Pembeli\Pembeli;


class DataLahanController extends Controller
{
    public function index(){

        $lahan_masuk = Lahan::where('status_lahan', 0)->get();
        $lahan_jual = Lahan::where('status_lahan', 1)->where('status_jual',0)->get();
        $sold_out = Lahan::where('status_jual', 1)->get();
        
        return view('admin.datalahan.lahan',compact('lahan_masuk', 'lahan_jual','sold_out'));
    }

    public function statuslahan(Request $request)
    {
        $lahan = Lahan::findOrFail($request->lahan_id);
        if($request->status_lahan == 0){
            $lahan->status_lahan = 0;
            $lahan->save();
        }else{
            $lahan->status_lahan = 1;
            $lahan->save();
        }
  
        return redirect()->route('admin.datalahan');
    }
}
