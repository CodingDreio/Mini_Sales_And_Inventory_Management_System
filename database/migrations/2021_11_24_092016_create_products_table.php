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
            $table->integer('category_id')
                    ->foreignId('category_id')
                    ->constrained('categories')
                    ->onUpdate('cascade')
                    ->nullable();
            $table->string('product_name',30);
            $table->decimal('price',6,2);
            $table->integer('quantity');
            $table->string('product_description');
            $table->integer('supplier_id');
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
