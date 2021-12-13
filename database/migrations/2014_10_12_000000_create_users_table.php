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
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->integer('role')->comment('[1] - Admin, [2] - Cashier, [3] - Inventory');
            $table->string('photo',50)->default('default.png');
            $table->string('street',50);
            $table->string('city',30);
            $table->string('province',30);
            $table->string('zip_code',8);
            $table->string('birthdate',12)->nullable();
            $table->string('phone_no',20);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            // $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
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
