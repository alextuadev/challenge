<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        "date", "user_id", "seller_id", "type"
    ];

    public function products() :HasMany
    {
        return $this->hasMany(\App\Models\Product::class, "invoice_id", "id");
    }

    public function scopeWithTotal($query)
    {
        $subselect = Product::selectRaw("SUM(products.quantity * products.price) as total")
        ->whereColumn('products.invoice_id', 'invoices.id');
        
        $query->addSelect([
            'total' => $subselect
        ]);
    }

    public function productsHigher100() :HasMany
    {   
        return $this->hasMany(\App\Models\Product::class, "invoice_id", "id")
            ->where("products.quantity", ">", 100);
    }

}
