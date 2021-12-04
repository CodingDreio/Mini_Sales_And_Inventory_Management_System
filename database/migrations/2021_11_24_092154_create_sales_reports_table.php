<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_reports', function (Blueprint $table) {
            $table->id('sales_report_id');
            $table->unsignedBigInteger('emp_id');
            $table->string('sales_invoice_no');
            $table->decimal('total_price', 8, 2)->default(0.00);
            $table->integer('cash')->nullable();
            $table->integer('change')->nullable();
            $table->integer('vatable_sale')->default(0.00)->comment('total price / 1.12')->nullable();
            $table->integer('vat_amount')->default(0.00)->comment('vatable sale x 12%')->nullable();
            $table->integer('status')->default(0)->comment('[0]-Pending [1]-Completed');
            $table->timestamps();
            $table->foreign('emp_id')
                ->references('id')->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_reports');
    }
}
