<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    // use App\Postkoment;


    class Pembeli extends Authenticatable implements MustVerifyEmail
    {
        use Notifiable;

        protected $table = 'pembeli';
        protected $guarded = [];

        protected $hidden = [
            'password', 'remember_token',
        ];

        protected $casts = [
            'email_verified_at' => 'datetime',
        ];    

        public function komentarpembeli(){
            return $this->hasMany(Pembeli::class);
        }

        // public function pembeli(){
        //     return $this->belongsTo(Postkoment::class,'id_user');
        // }
    }