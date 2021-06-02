<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class KomentarPenjual extends Model
{   
    protected $guarded = [];
    protected $table = "komentarpenjual";

    public function penjual(){
        return $this->belongsTo(User::class,'id_penjual');
    }
}
