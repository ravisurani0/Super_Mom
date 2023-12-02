<?php

use App\Model\Category;
use App\Model\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });

        $products = Product::withTrashed()->pluck('name', 'id');
        foreach ($products as $id => $product) {
            $slug = strtolower(str_replace(' ', '_', trim($product)));
            Product::where('id', $id)->update(['slug' => $slug]);
        }

        $categorys = Category::pluck('title', 'id');
        foreach ($categorys as $id => $category) {
            $slug = strtolower(str_replace(' ', '_', trim($category)));
            Category::where('id', $id)->update(['slug' => $slug]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
