<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('mobile_no')->nullable()->unique();
            $table->string('whatsapp_no')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('email')->nullable()->unique();
            $table->unsignedInteger('role');
            $table->string('seller_id')->nullable();
            $table->boolean('requested_seller_id')->nullable();
            $table->double('discount')->nullable();
            $table->double('commission')->nullable();
            $table->double('account_balance')->nullable();
            $table->boolean('user_status')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
