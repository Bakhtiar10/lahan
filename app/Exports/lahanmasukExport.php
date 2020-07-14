<?php

namespace App\Exports;
use App\Lahan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exporttable;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class lahanmasukExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('admin.datalahan.lahanmasuk_excel', [
            'lahan_masuk' => Lahan::where('status_lahan', 0)->get()
        ]);
    }
}
