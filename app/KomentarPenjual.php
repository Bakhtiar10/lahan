<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model_Penjual\Penjual;

class KomentarPenjual extends Model
{   
    protected $guarded = [];
    protected $table = "komentarpenjual";

    public function penjual(){
        return $this->belongsTo(Penjual::class,'id_penjual');
    }
}
