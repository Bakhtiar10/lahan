<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penjual;
use App\Lahan;
use App\Pembeli;
use App\Survei;
use App\SoldOut;

use App\Exports\lahanmasukExport;
use App\Exports\lahanjualExport;
use App\Exports\soldoutExport;
use Excel;
use PDF;



class DataLahanController extends Controller
{
    public function index(){

        $lahan_masuk = Lahan::where('status_lahan', 0)->get();
        return view('admin.datalahan.lahanmasuk',compact('lahan_masuk'));
    }

    public function detaillahanmasuk($id){
        $detaillahanmasuk = Lahan::find($id);
        return view('admin.datalahan.detaillahanmasuk',compact('detaillahanmasuk'));
    }

    public function lahandijual(){
        $lahan_jual = Lahan::where('status_lahan', 1)->where('status_jual',0)->get();
        
        return view('admin.datalahan.lahandijual',compact('lahan_jual'));
    }

    public function lahansoldout(){
        $sold_out = SoldOut::with(['lahan', 'lahan.user'])
        ->get();
        
        return view('admin.datalahan.lahansoldout',compact('sold_out'));
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
  
        return redirect()->route('admin.datalahanmasuk');
    }

    public function lahanmasukPDF()
    {
    	$lahan_masuk = Lahan::where('status_lahan', 0)->get();
    	$pdf = PDF::loadview('admin.datalahan.lahanmasuk_pdf',['lahan_masuk'=>$lahan_masuk]);
    	return $pdf->stream('data_lahanmasuk_pdf');
    }

    public function lahanjualPDF()
    {
    	$lahan_jual = Lahan::where('status_lahan', 1)->where('status_jual',0)->get();
    	$pdf = PDF::loadview('admin.datalahan.lahanjual_pdf',['lahan_jual'=>$lahan_jual]);
    	return $pdf->stream('data_lahanjual_pdf');
    }

    public function soldoutPDF()
    {
        $sold_out = SoldOut::with(['lahan', 'lahan.user'])->get();
        // dd($sold_out);
    	$pdf = PDF::loadview('admin.datalahan.soldout_pdf',['sold_out'=>$sold_out]);
    	return $pdf->stream('data_soldout_pdf');
    }

    public function lahanmasukExcel()
	{
		return Excel::download(new lahanmasukExport, 'lahan_masuk.xlsx');
    }

    public function lahanjualExcel()
	{
		return Excel::download(new lahanjualExport, 'lahan_jual.xlsx');
    }

    public function soldoutExcel()
	{
		return Excel::download(new soldoutExport, 'soldout.xlsx');
    }

}
