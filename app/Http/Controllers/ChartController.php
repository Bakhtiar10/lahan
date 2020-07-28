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
        )->groupBy('jenis_lahan')->get();
     
        return response()->json($chart);
    }
}
