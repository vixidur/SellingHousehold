<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class RegisterModel extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'accounts';

    protected $fillable = [
        'full_name',
        'email',
        'username',
        'password',
        'agreed_to_terms',
        'email_verified_at',
    ];
}
