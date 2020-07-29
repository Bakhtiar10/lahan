<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Survei;

use App\Exports\surveimasukExport;
use App\Exports\historisurveiExport;
use Excel;
use PDF;

use Illuminate\Http\Request;

class SurveiController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $survei_masuk = Survei::where('status_survei', 0)->get();
        $konfirmasi = Survei::where('status_survei', 1)->get();
        return view('admin.datasurvei.index',compact('survei_masuk' , 'konfirmasi'));
    }

    public function detailsurveimasuk($id){
        $detailsurveimasuk = Survei::find($id);
        return view('admin.datasurvei.detailsurveimasuk',compact('detailsurveimasuk'));
    }

    public function status_survei(Request $request, $id)
    {
        $survei = Survei::findOrFail($id);
        $survei->update(['status_survei' => !$survei->status_survei]);
  
        return redirect()->route('admin.survei');
    }

    public function surveimasukPDF()
    {
       
        $survei_masuk = Survei::where('status_survei', 0)->get();
 
    	$pdf = PDF::loadview('admin.datasurvei.surveimasuk_pdf',['survei_masuk'=>$survei_masuk]);
    	return $pdf->stream('data_surveimasuk_pdf');
    }

    public function historisurveiPDF()
    {
    	$konfirmasi = Survei::where('status_survei', 1)->get();
 
    	$pdf = PDF::loadview('admin.datasurvei.history_pdf',['konfirmasi'=>$konfirmasi]);
    	return $pdf->stream('data_historisurvei_pdf');
    }

    public function surveimasukExcel()
	{
		return Excel::download(new surveimasukExport, 'survei_masuk.xlsx');
    }

    public function historisurveiExcel()
	{
		return Excel::download(new historisurveiExport, 'histori_survei.xlsx');
    }

}
