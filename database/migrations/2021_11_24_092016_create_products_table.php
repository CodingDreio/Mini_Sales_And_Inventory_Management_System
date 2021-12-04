<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('code',30)->unique()->nullable();
            $table->integer('category_id')
                    ->foreignId('category_id')
                    ->constrained('categories')
                    ->onUpdate('cascade')
                    ->nullable();
            $table->string('product_name',30);
            $table->decimal('price',11,2);
            $table->integer('quantity');
            $table->string('product_description',255)->nullable();
            $table->string('photo')->default('images/asus-rog.jpg');
            $table->integer('vat')->default(0)->comment('[1] - Applicable [0] - Not Applicable');
            $table->integer('supplier_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
