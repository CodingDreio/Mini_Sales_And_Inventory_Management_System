<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('sales_report_id')->foreignId('sales_report_id')->constrained('sales_reports')->onUpdate('cascade');
            $table->integer('product_id')->foreignId('product_id')->constrained('products')->onUpdate('cascade');
            $table->integer('quantity');
            $table->decimal('discount', 5, 2);
            $table->decimal('total_price', 8, 2);
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
        Schema::dropIfExists('orders');
    }
}
