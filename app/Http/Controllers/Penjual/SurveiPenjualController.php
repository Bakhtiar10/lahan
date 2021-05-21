<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Survei;
use App\Lahan;
use App\SoldOut;
use Auth;

class SurveiPenjualController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $survei = Survei::with(['lahan', 'lahan.user'])->where('status_survei', 1)->whereHas('lahan.user',
        function($query){
            $query->where('id_penjual', Auth::user()->id);
        })->whereHas('lahan', function($query){
            $query->where('status_jual',0);
        })->get();
        
        $sold_out = SoldOut::with(['lahan', 'lahan.user', 'user', 'lahan.survey'])->where('id_penjual', Auth::user()->id)
        ->whereHas('lahan.survey', function($query){
            $query->where('id_penjual', Auth::user()->id);
        })
        ->get();
        // dd($sold_out);

        return view('penjual.datasurvei.index',compact('survei', 'sold_out'));
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
            
            SoldOut::create([
                'id_lahan' => $lahan->id,
                'id_pembeli' => $request->id_pembeli,
                'id_penjual' => Auth::user()->id,
                'foto_ktp' => $request->foto_ktp
            ]);
        }


  
        return redirect()->route('surveipenjual');
    }
}
