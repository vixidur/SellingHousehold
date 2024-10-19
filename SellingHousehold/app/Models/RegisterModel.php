<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class RegisterModel extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'users'; // Use the correct table
    protected $primaryKey = 'id'; // Set primary key
    protected $fillable = [
        'full_name',
        'email',
        'username',
        'password',
        'agreed_to_terms',
    ];

    protected $dates = ['email_verified_at'];

    public function getAuthIdentifierName()
    {
        return 'username'; // For login via username
    }

    public function getEmailForVerification()
    {
        return $this->email; // Used for sending verification email
    }
}
