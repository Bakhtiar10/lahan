<?php

    namespace App\Model_Penjual;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Penjual extends Authenticatable implements MustVerifyEmail
    {
        use Notifiable;

        protected $table = 'penjual';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }