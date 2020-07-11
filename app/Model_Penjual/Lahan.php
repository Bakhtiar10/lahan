<?php

namespace App\Model_Penjual;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Lahan extends Model
{
    protected $table = 'lahan';
    protected $guarded = [];

    public function penjual(){
        return $this->belongsTo(Penjual::class,'id_penjual');
    }

    public function images(){
        return $this->hasMany(Image::class,'id_lahan');
    }
}
