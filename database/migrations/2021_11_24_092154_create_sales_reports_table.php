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
            $table->integer('emp_id')->foreignId('emp_id')->constrained('employees')->onUpdate('cascade');
            $table->integer('quantity');
            $table->decimal('total_price', 8, 2);
            $table->integer('cash');
            $table->integer('change');
            $table->integer('vatable_sale')->default(0)->comment('total price / 1.12');
            $table->integer('vat_amount')->default(0)->comment('vatable sale x 12%');
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
        Schema::dropIfExists('sales_reports');
    }
}
