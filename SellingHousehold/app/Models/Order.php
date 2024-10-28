<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the table name explicitly (optional if Laravel naming conventions are followed)
    protected $table = 'orders';

    // Specify which columns can be mass-assigned
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
    ];

    /**
     * Relationship to the `OrderItem` model.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Relationship to the `User` model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to the `Payment` model.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
