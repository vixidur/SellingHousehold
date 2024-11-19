<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;

    protected $table = 'lienhe';

    protected $primaryKey = 'malienhe';

    protected $fillable = [
        'ten',
        'email',
        'noi_dung',
    ];
}
