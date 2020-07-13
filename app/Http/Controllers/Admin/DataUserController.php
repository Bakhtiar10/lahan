<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model_Penjual\Penjual;
use App\Model_Pembeli\Pembeli;
use App\Exports\pembeliExport;
use App\Exports\penjualExport;
use Excel;
use PDF;


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

    public function pembeliPDF()
    {
    	$pembeli = Pembeli::all();
 
    	$pdf = PDF::loadview('admin.datauser.pembeli_pdf',['pembeli'=>$pembeli]);
    	return $pdf->stream('data_pembeli_pdf');
    }

    public function penjualPDF()
    {
    	$penjual = Penjual::all();
 
    	$pdf = PDF::loadview('admin.datauser.penjual_pdf',['penjual'=>$penjual]);
    	return $pdf->stream('data_penjual_pdf');
    }

    public function penjualExcel()
	{
		return Excel::download(new penjualExport, 'data_penjual.xlsx');
    }
    
    public function pembeliExcel()
	{
		return Excel::download(new pembeliExport, 'data_pembeli.xlsx');
	}
}
