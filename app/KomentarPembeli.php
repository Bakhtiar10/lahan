<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class KomentarPembeli extends Model
{
    protected $guarded = [];
    protected $table = "komentarpembeli";


    public function pembeli(){
        return $this->belongsTo(User::class,'id_pembeli');
    }
}
