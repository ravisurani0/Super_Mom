<?php

use App\Model\Role;
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
        Schema::table('roles', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });

        $roles = Role::pluck('title', 'id');
        foreach ($roles as $id => $role) {
            $slug = strtolower(str_replace(' ', '_', trim($role)));
            Role::where('id', $id)->update(['slug' => $slug]);
        }

        
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_block')->default(false);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
