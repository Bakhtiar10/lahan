<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\Comment;
use App\User;
use App\Survei;


class Lahan extends Model
{
    protected $table = 'lahan';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'id_penjual');
    }

    public function images(){
        return $this->hasMany(Image::class,'id_lahan');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'id_lahan')->whereNull('parent_id');
    }

    public function survey(){
        return $this->hasMany(Survei::class, 'id_lahan');
    }
}
