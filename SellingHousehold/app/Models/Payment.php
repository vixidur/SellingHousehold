<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Define the table name explicitly (optional)
    protected $table = 'payments';

    // Specify which columns can be mass-assigned
    protected $fillable = [
        'order_id',
        'payment_method',
        'payment_status',
        'payment_date',
    ];

    /**
     * Relationship to the `Order` model.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
