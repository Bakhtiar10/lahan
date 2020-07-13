<?php

namespace App\Exports;
use App\Model_Penjual\Lahan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exporttable;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class lahanjualExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('admin.datalahan.lahanjual_excel', [
            'lahan_jual' => Lahan::where('status_lahan', 1)->where('status_jual',0)->get()
        ]);
    }
}
