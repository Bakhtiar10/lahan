<?php

namespace App\Exports;
use App\Survei;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exporttable;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class surveimasukExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('admin.datasurvei.surveimasuk_excell', [
            'survei_masuk' => Survei::where('status_survei', 0)->get()
        ]);
    }
}