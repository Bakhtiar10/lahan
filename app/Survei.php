<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penjual;
use App\Pembeli;
use App\Lahan;

class Survei extends Model
{
    protected $table = 'survei';
    protected $guarded = [];

    public function lahan(){
        return $this->belongsTo(Lahan::class,'id_lahan');
    }

    public function pembeli(){
        return $this->belongsTo(Pembeli::class, 'id_pembeli');
    }
}
