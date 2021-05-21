<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Lahan;

class Survei extends Model
{
    protected $table = 'survei';
    protected $guarded = [];

    public function lahan(){
        return $this->belongsTo(Lahan::class,'id_lahan');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_pembeli');
    }
}
