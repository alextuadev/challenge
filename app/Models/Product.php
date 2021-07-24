<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable = [
        "invoice_id",
        "name",
        "quantity",
        "price",
    ];

    public function scopePriceHigherThan($query, $value = 0)
    {
        $query->where("products.price", ">", $value);
    }
    
}
