<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Survei;
use App\Lahan;
use Auth;

class SurveiPenjualController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:penjual');
    }

    public function index()
    {
        $pesan_masuk = Survei::with('lahan')->where('status_pesan', 1)->whereHas('lahan', function($query_lahan){
        $query_lahan->where('status_jual', 0);
        })->get();
        // dd($pesan_masuk);

        $konfirmasi = Survei::with(['lahan', 'lahan.penjual'])->where('status_survei', 1)->whereHas('lahan.penjual',
        function($query){
            $query->where('id_penjual', Auth::user()->id);
        })->whereHas('lahan', function($query_jual){
            $query_jual->where('status_jual', 1);
        })->get();


        // dd($konfirmasi);
        $survei = Survei::with(['lahan', 'lahan.penjual'])->where('status_survei', 1)->whereHas('lahan.penjual',
        function($query){
            $query->where('id_penjual', Auth::user()->id);
        })->get();



        // dd($survei);
        return view('penjual.datasurvei.index',compact('survei', 'pesan_masuk', 'konfirmasi'));
    }

    public function statusjual(Request $request)
    {
        $lahan = Lahan::findOrFail($request->lahan_id);
        if($request->status_jual == 0){
            $lahan->status_jual = 0;
            $lahan->save();
        }else{
            $lahan->status_jual = 1;
            $lahan->save();
        }
  
        return redirect()->route('penjual.survei');
    }
}
