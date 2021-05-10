<?php

namespace App\Http\Controllers\Pembeli;


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
        return view('pembeli.peta.peta');
    }

   public function peta(){
        $peta = Peta::with('images')->where('status_lahan', 1)->where('status_jual', 0)->get();
        return $peta;
    }


    public function detail_lahan($datalahan)
    {
        $peta = Lahan::with(['comments', 'comments.child'])->where('id', $datalahan)->first();
        return view('pembeli.peta.detail_lahan', compact('peta'));
    }

}
