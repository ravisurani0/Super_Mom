<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->longText('tags')->nullable();
        });

        Schema::table('cms', function (Blueprint $table) {
            $table->longText('tags')->nullable();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('tags');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('meta_keywords', 'tags');
            $table->renameColumn('isBestseller', 'is_best_seller');
            $table->renameColumn('isNewProduct', 'is_new_product');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->renameColumn('value', 'slug');
        });
      
    }

    public function down(): void
    {
        //
    }
};
