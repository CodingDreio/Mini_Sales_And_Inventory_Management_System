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
            $table->increments('order_id');
            $table->unsignedBigInteger('sales_report_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('discount', 11, 2)->nullable();
            $table->integer('discount_type')->nullable()->comment('[0]-Peso [1]-Percent');
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
            $table->foreign('sales_report_id')
                ->references('sales_report_id')->on('sales_reports')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('product_id')
                ->references('product_id')->on('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
