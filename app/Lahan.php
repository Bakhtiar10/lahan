<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\Comment;

class Lahan extends Model
{
    protected $table = 'lahan';
    protected $guarded = [];

    public function penjual(){
        return $this->belongsTo(Penjual::class,'id_penjual');
    }

    public function images(){
        return $this->hasMany(Image::class,'id_lahan');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'id_lahan')->whereNull('parent_id');
    }
}
