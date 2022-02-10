<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Chat extends Model
{
    protected $guarded = [];


    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }

    public function receive(){
        return $this->belongsTo(User::class,'receive_id');
    }
}
