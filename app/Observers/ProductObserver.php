<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\Product;

class ProductObserver
{
    public function retrieved(Product $product)
    {
        //
    }

    public function created(Product $product)
    {
        $result = Product::selectRaw("SUM(products.quantity * products.price) as totalProduct")
                    ->where("invoice_id", $product->invoice_id)
                    ->first();
        $invoice = Invoice::find($product->invoice_id);
        $invoice->total = $result->totalProduct;
        $invoice->save();
    }

    public function creating(Product $product)
    {
        //
    }

    function updated(Product $product)
    {
        //
    }

    public function deleting(Product $product)
    {
        //
    }

    public function deleted(Product $product)
    {
        //
    }

    public function restored(Product $product)
    {
        //
    }

    public function forceDeleted(Product $product)
    {
        //
    }

}
