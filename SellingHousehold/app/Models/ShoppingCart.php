<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;


    // ánh xạ các trường trong bảng shopping_carts tương ứng với $fillable
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // tạo ra function phụ  thuộc vào Models\Product

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
