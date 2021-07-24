<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user_data = [
            "email" => "solucionesborgesinformatico@gmail.com", 
            "password" => bcrypt("password")
        ];
        
        $user = \App\Models\User::factory($user_data)->create();
        $seller = \App\Models\Seller::factory()->create();

        $invoice_data = [
            "seller_id" => $seller->id,
            "user_id" => $user->id
        ];
        
        $invoices = \App\Models\Invoice::factory($invoice_data)->times(2)->create();

        foreach ($invoices as $invoice) {
            for ($i=0; $i < random_int(3, 8); $i++) { 
                \App\Models\Product::factory(["invoice_id" => $invoice->id])->create();
            }
        }

    }
}
