<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lahan;
use App\User;
use App\Pembeli;

class SoldOut extends Model
{
    protected $guarded = [];

    public function lahan(){
        return $this->belongsTo(Lahan::class, 'id_lahan');
    }


}
