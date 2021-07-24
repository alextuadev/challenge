<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::withTotal()->get(); //desafio 1.1

        $ids = Invoice::with(["productsHigher100"]) //desafio 1.2
            ->get()
            ->filter(function($item){ 
                return count($item->productsHigher100) > 0;
            })->pluck("id");

        $products = Product::select("name") //desafio 1.3
            ->priceHigherThan(1000000)
            ->get();

        return view("invoices.index", compact(["invoices", "ids", "products"]));
    }
}
