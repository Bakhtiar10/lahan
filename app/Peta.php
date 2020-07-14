<?php

namespace App;

use App\Image;
use Storage;

use Illuminate\Database\Eloquent\Model;

class Peta extends Model
{
    protected $table = 'lahan';
    protected $guarded = [];

    public function images(){
        return $this->hasMany(Image::class, 'id_lahan');
    }

    public function penjual(){
        return $this->belongsTo(Penjual::class,'id_penjual');
    }
}
