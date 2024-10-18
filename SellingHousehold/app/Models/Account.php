<?php

namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;
    protected $table = 'accounts';
}
