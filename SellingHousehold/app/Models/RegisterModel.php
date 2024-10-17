<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    use HasFactory;

    protected $table = 'accounts'; 
    protected $fillable = [
        'full_name',
        'email',
        'username',
        'password',
        'agreed_to_terms',
    ];
}