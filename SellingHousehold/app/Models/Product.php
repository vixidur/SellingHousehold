<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category_id',
        'image_url', 
        'discount'
    ];

    // Relation with Category model (assuming you have Category model)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}