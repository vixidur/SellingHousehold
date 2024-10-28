<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Define the table name explicitly (optional)
    protected $table = 'order_items';

    // Specify which columns can be mass-assigned
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Relationship to the `Order` model.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relationship to the `Product` model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
