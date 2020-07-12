<?php

    namespace App\Model_Pembeli;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Pembeli extends Authenticatable implements MustVerifyEmail
    {
        use Notifiable;

        protected $table = 'pembeli';
        protected $guarded = [];

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        protected $casts = [
            'email_verified_at' => 'datetime',
        ];    

        public function komentarpembeli(){
            return $this->hasMany(Pembeli::class);
        }
    }