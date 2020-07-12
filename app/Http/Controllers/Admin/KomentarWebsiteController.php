<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KomentarPenjual;
use App\KomentarPembeli;
use App\Exports\KomentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PembeliExport;
use PDF;

class KomentarWebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   
    public function penjual() {
        $penjual = KomentarPenjual::with(['penjual'])->get();
        return view('admin.komentarwebsite.penjual', compact('penjual'));
    }

    public function pembeli() {
        $pembeli = komentarPembeli::with(['pembeli'])->get();
        return view('admin.komentarwebsite.pembeli', compact('pembeli'));
    }

    public function penjualPDF()
    {
    	$penjual = KomentarPenjual::all();
 
    	$pdf = PDF::loadview('admin.komentarwebsite.penjual_pdf',['penjual'=>$penjual]);
    	return $pdf->stream('data_penjual_pdf');
    }

    public function pembeliPDF()
    {
    	$pembeli = komentarPembeli::all();
 
    	$pdf = PDF::loadview('admin.komentarwebsite.pembeli_pdf',['pembeli'=>$pembeli]);
    	return $pdf->stream('komentar_pembeli_pdf');
    }
}
