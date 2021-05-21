<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lahan;

class ChartController extends Controller
{
    public function chartJenisLahan()
    {
        $chart = Lahan::select(
            \DB::raw('count(jenis_lahan) as total'),
            \DB::raw('jenis_lahan')
        )->join('sold_outs', 'lahan.id', '=', 'sold_outs.id_lahan')->groupBy('jenis_lahan')->get();
     
        return response()->json($chart);
    }

    public function chartJenisLahanBelumTerjual() {
        $chart = Lahan::select(
            \DB::raw('count(jenis_lahan) as total'),
            \DB::raw('jenis_lahan')
        )->groupBy('jenis_lahan')->where('status_jual', 0)->orderBy('jenis_lahan')->get();
     
        return response()->json($chart);
    }
}
