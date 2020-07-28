<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use App\Postkoment;

    class Penjual extends Authenticatable implements MustVerifyEmail
    {
        use Notifiable;

        protected $table = 'penjual';
        protected $guarded = [];


        protected $hidden = [
            'password', 'remember_token',
        ];

        protected $casts = [
            'email_verified_at' => 'datetime',
        ];  

        public function komentarpenjual(){
            return $this->hasMany(Penjual::class);
        }

        public function penjual(){
            return $this->belongsTo(Postkoment::class,'id_user');
        }
    }