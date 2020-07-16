<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Survei;

use Illuminate\Http\Request;

class SurveiController extends Controller
{
    public function index()
    {
        $survei_masuk = Survei::where('status_survei', 0)->get();
        $konfirmasi = Survei::where('status_survei', 1)->get();
        return view('admin.datasurvei.index',compact('survei_masuk' , 'konfirmasi'));
    }

    public function status_survei(Request $request)
    {
        $survei = Survei::findOrFail($request->survei_id);
        if($request->status_survei == 0){
            $survei->status_survei = 0;
            $survei->save();
        }else{
            $survei->status_survei = 1;
            $survei->save();
        }
  
        return redirect()->route('admin.survei');
    }
}
