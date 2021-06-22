<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lahan;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {        
        $lahans = Lahan::with('images','user')->where('status_lahan', 1)->where('status_jual', 0)->get();

        return view('landingpage', compact('lahans'));
    }

    public function lahanJson(Request $request){
        $lahan = Lahan::with('images','user')->where('status_lahan', 1)->where('status_jual', 0)
        ->where(function($query) use($request){
            return $request->cari ? 
                $query->from('cari')->where('judul_lahan', 'LIKE', '%'.$request->cari.'%') : '';
        })
        ->where(function($query) use($request) {
            return $request->kecamatan ?
                $query->from('kecamatan')->where('kecamatan',$request->kecamatan) : '';
        })
        ->where(function($query) use($request) {
            return $request->jenis_lahan ?
                $query->from('jenis_lahan')->where('jenis_lahan',$request->jenis_lahan) : '';
        })
        ->paginate(6);
        // ->get();
        
        if($request->harga_lahan){
            $lahan = Lahan::with('images','user')->where('status_lahan', 6)->where('status_jual', 0)
            ->where(function($query) use($request){
                return $request->cari ? 
                    $query->from('cari')->where('judul_lahan', 'LIKE', '%'.$request->cari.'%') : '';
            })
            ->where(function($query) use($request) {
                return $request->kecamatan ?
                    $query->from('kecamatan')->where('kecamatan',$request->kecamatan) : '';
            })
            ->where(function($query) use($request) {
                return $request->jenis_lahan ?
                    $query->from('jenis_lahan')->where('jenis_lahan',$request->jenis_lahan) : '';
            })->orderBy('harga_lahan', $request->harga_lahan === 'Termurah' ? 'ASC' : 'DESC')
            ->paginate(6);
        }

        return response()->json([
            'data' => $lahan
        ]);
    }

    public function viewlogin()
    {
        return view('viewlogin',compact('login'));
    }
}
