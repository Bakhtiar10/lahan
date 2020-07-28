<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Survei;

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

    public function status_survei(Request $request, $id)
    {
        $survei = Survei::findOrFail($id);
        $survei->update(['status_survei' => !$survei->status_survei]);
  
        return redirect()->route('admin.survei');
    }
}
