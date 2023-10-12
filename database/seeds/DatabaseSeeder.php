<?php

use App\Model\Product;
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([[

            'company_name' => 'super admin',
            'mobile_no' => '9998887770',
            'whatsapp_no' => '9998887770',
            'address' => 'Admin Address',
            'email' => 'superadmin@mail.com',
            'role' => '1',
            'seller_id' => '',
            'requested_seller_id' => '',
            'discount' => '',
            'commission' => '',
            'account_balance' => '',
            'user_status' => true,
            'email_verified_at' => '',
            'password' => '$2y$10$E4ihg/xn8R3wdQ9je6okjeUKSOTtp8EESVZOo6nfHCJDobDgn00qS'

        ], [
            'company_name' => 'admin',
            'mobile_no' => '1112223330',
            'whatsapp_no' => '1112223330',
            'address' => 'Admin Address',
            'email' => 'admin@mail.com',
            'role' => '1',
            'seller_id' => '',
            'requested_seller_id' => '',
            'discount' => '',
            'commission' => '',
            'account_balance' => '',
            'user_status' => true,
            'email_verified_at' => '',
            'password' => '$2y$10$E4ihg/xn8R3wdQ9je6okjeUKSOTtp8EESVZOo6nfHCJDobDgn00qS'
        ],]);

        Product::insert([[
            'name' => 'Product 1',
            'short_name' => 'product 1',
            'description' => 'product 1 description',
            'image' => '',
            'price' => '100',
            'gst_rate' => '10',
            'hsn_code' => '123',
            'carton_capacity' => '123',
            'status' => true,
        ], [
            'name' => 'Product 2',
            'short_name' => 'product 2',
            'description' => 'product 2 description',
            'image' => '',
            'price' => '150',
            'gst_rate' => '10',
            'hsn_code' => '1231',
            'carton_capacity' => '123',
            'status' => true,
        ], [
            'name' => 'Product 4',
            'short_name' => 'product 4',
            'description' => 'product 4 description',
            'image' => '',
            'price' => '150',
            'gst_rate' => '10',
            'hsn_code' => '154231',
            'carton_capacity' => '1232',
            'status' => true,
        ], [
            'name' => 'Product 65',
            'short_name' => 'product 65',
            'description' => 'product 65 description',
            'image' => '',
            'price' => '780',
            'gst_rate' => '10',
            'hsn_code' => '6512',
            'carton_capacity' => '123',
            'status' => true,
        ],]);
    }
}
