<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penjual;

class KomentarPenjual extends Model
{   
    protected $guarded = [];
    protected $table = "komentarpenjual";

    public function penjual(){
        return $this->belongsTo(Penjual::class,'id_penjual');
    }
}
