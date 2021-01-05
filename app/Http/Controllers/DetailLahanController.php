<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lahan;
use App\Peta;

class DetailLahanController extends Controller
{
    public function index($datalahan)
    {
        $lahan = Lahan::with('images')->where('id', $datalahan)->first();
        // dd($lahan);
        return view('detaillahan', compact('lahan'));
    }
}
