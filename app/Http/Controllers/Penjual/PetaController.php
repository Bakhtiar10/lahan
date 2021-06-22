<?php

namespace App\Http\Controllers\Penjual;


use App\Peta;
use App\Lahan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Storage;
use Comment;

class PetaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('penjual.peta.peta');
    }

   public function peta(Request $request){
        // $peta = Peta::with('images')->where('status_lahan', 1)->where('status_jual', 0)->get();
        $peta = Peta::with('images', 'user')->where('status_lahan', 1)->where('status_jual', 0)
        ->where(function($query) use($request){
            return $request->kecamatan ?
                $query->from('kecamatan')->where('kecamatan',$request->kecamatan) : '';
        })
        ->where(function($query) use($request){
            return $request->jenis_lahan ?
                $query->from('jenis_lahan')->where('jenis_lahan', $request->jenis_lahan) : '';
        })
        ->where(function($query) use($request){
            if($request->harga_lahan){
                if($request->harga_lahan === '<100'){
                    return $query->from('harga_lahan')->whereBetween('harga_lahan', [0,100000000]);
                }else if($request->harga_lahan === '100-200'){
                    return $query->from('harga_lahan')->whereBetween('harga_lahan', [100000000,200000000]);
                }else if($request->harga_lahan === '200-300'){
                    return $query->from('harga_lahan')->whereBetween('harga_lahan', [200000000,300000000]);
                }else if($request->harga_lahan === '>300'){
                    return $query->from('harga_lahan')->where('harga_lahan', '>', 300000000);
                }
            }else{
                return '';
            }
        })
        ->get();
        return $peta;
    }


    public function detail_lahan($datalahan)
    {
        $peta = Lahan::with(['comments', 'comments.child'])->where('id', $datalahan)->first();
        return view('penjual.peta.detail_lahan', compact('peta'));
    }

}
