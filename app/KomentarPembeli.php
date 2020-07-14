<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pembeli;

class KomentarPembeli extends Model
{
    protected $guarded = [];
    protected $table = "komentarpembeli";


    public function pembeli(){
        return $this->belongsTo(Pembeli::class,'id_pembeli');
    }
}
