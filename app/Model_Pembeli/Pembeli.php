<?php

    namespace App\Model_Pembeli;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Pembeli extends Authenticatable implements MustVerifyEmail
    {
        use Notifiable;

        protected $table = 'pembeli';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }