<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lahan;
use App\Peta;

class Image extends Model
{
    protected $table = "image";
    protected $guarded = [];

    public function lahan(){
        return $this->belongsTo(Lahan::class);
    }

    public function peta(){
        return $this->belongsTo(Peta::class);
    }
}
