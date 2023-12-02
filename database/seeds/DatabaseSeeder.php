<?php

use App\Model\Product;
use App\Model\Role;
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
        Role::insert([
            [
                'id' => "1",
                'title' => "Super Admin",
                'status' => true,
            ], [
                'id' => "2",
                'title' => "Manager",
                'status' => true,
            ],
            [
                'id' => "3",
                'title' => "Dealer",
                'status' => true,
            ],
        ]);
        User::insert([[
            'company_name' => 'super admin',
            'mobile_no' => '9999999999',
            'whatsapp_no' => '9999999999',
            'address' => 'Admin Address',
            'email' => 'superadmin@mail.com',
            'role' => '1',
            'seller_id' => 'Super Admin',
            'discount' => '',
            'commission' => '',
            'account_balance' => '',
            'user_status' => true,
            'email_verified_at' => '',
            'password' => '$2y$10$mxO136OWcfwjc73Ufi5MueweukE3DF3vfPPdsFnSgm8H1.do.l.ue'

        ], [
            'company_name' => 'Manager',
            'mobile_no' => '8888888888',
            'whatsapp_no' => '8888888888',
            'address' => 'Manager Address',
            'email' => 'manager@mail.com',
            'role' => '2',
            'seller_id' => 'Manager',
            'discount' => '',
            'commission' => '',
            'account_balance' => '',
            'user_status' => true,
            'email_verified_at' => '',
            'password' => '$2y$10$mxO136OWcfwjc73Ufi5MueweukE3DF3vfPPdsFnSgm8H1.do.l.ue'
        ], [
            'company_name' => 'Dealer',
            'mobile_no' => '7777777777',
            'whatsapp_no' => '7777777777',
            'address' => 'Manager Address',
            'email' => 'dealer@mail.com',
            'role' => '3',
            'seller_id' => '',
            'discount' => '',
            'commission' => '',
            'account_balance' => '',
            'user_status' => true,
            'email_verified_at' => '',
            'password' => '$2y$10$mxO136OWcfwjc73Ufi5MueweukE3DF3vfPPdsFnSgm8H1.do.l.ue'
        ],]);

        // Product::insert([[
        //     'name' => 'Product 1',
        //     'short_name' => 'product 1',
        //     'description' => 'product 1 description',
        //     'image' => '',
        //     'price' => '100',
        //     'gst_rate' => '10',
        //     'hsn_code' => '123',
        //     'carton_capacity' => '123',
        //     'status' => true,
        // ], [
        //     'name' => 'Product 2',
        //     'short_name' => 'product 2',
        //     'description' => 'product 2 description',
        //     'image' => '',
        //     'price' => '150',
        //     'gst_rate' => '10',
        //     'hsn_code' => '1231',
        //     'carton_capacity' => '123',
        //     'status' => true,
        // ], [
        //     'name' => 'Product 4',
        //     'short_name' => 'product 4',
        //     'description' => 'product 4 description',
        //     'image' => '',
        //     'price' => '150',
        //     'gst_rate' => '10',
        //     'hsn_code' => '154231',
        //     'carton_capacity' => '1232',
        //     'status' => true,
        // ], [
        //     'name' => 'Product 65',
        //     'short_name' => 'product 65',
        //     'description' => 'product 65 description',
        //     'image' => '',
        //     'price' => '780',
        //     'gst_rate' => '10',
        //     'hsn_code' => '6512',
        //     'carton_capacity' => '123',
        //     'status' => true,
        // ],]);
    }
}
