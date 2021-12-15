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
            $table->decimal('total_price', 15, 2)->default(0.00);
            $table->decimal('cash',15,2)->nullable();
            $table->decimal('change',15,2)->nullable();
            $table->decimal('vatable_sale',15,2)->default(0.00)->comment('total price / 1.12')->nullable();
            $table->decimal('vat_amount',15,2)->default(0.00)->comment('vatable sale x 12%')->nullable();
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
