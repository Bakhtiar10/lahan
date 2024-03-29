<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\VerifyMail;
use App\Chat;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password', 'role_id', 'no_hp', 'image'
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }
    
    // public function hasPermission($permission) {
    //     return $this->role->permissions()->where('name', $permission)->first() ?: false;
    // }

    public function verifyMail() {
        return $this->hasOne(VerifyMail::class);
    }

    public function chat() {
        return $this->hasMany(Chat::class);
    }
}
