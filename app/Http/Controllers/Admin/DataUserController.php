<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penjual;
use App\User;
use App\Pembeli;
use App\Exports\pembeliExport;
use App\Exports\penjualExport;
use Excel;
use PDF;


class DataUserController extends Controller
{
    
    public function penjual(){
        $penjual = User::where('role_id', 2)->get();
        return view('admin.datauser.penjual',compact('penjual'));
    }

    public function pembeli(){
        $pembeli = User::where('role_id', 3)->get();;
        return view('admin.datauser.pembeli',compact('pembeli'));
    }

    public function detailpembeli($id){
        $detailpembeli = User::find($id);
        // dd($detailpembeli);
        return view('admin.datauser.detailpembeli',compact('detailpembeli'));
    }

    public function detailpenjual($id){
        $detailpenjual = User::find($id);
        return view('admin.datauser.detailpenjual',compact('detailpenjual'));
    }

    public function pembeliPDF()
    {
    	$pembeli = User::where('role_id', 3)->get();
 
    	$pdf = PDF::loadview('admin.datauser.pembeli_pdf',['pembeli'=>$pembeli]);
    	return $pdf->stream('data_pembeli_pdf');
    }

    public function penjualPDF()
    {
    	$penjual = User::where('role_id', 2)->get();
 
    	$pdf = PDF::loadview('admin.datauser.penjual_pdf',['penjual'=>$penjual]);
    	return $pdf->stream('data_user.pdf');
    }

    public function penjualExcel()
	{
		return Excel::download(new penjualExport, 'data_user.xlsx');
    }
    
    public function pembeliExcel()
	{
		return Excel::download(new pembeliExport, 'data_pembeli.xlsx');
	}
}
