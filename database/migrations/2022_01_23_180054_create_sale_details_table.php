<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->timestampsTz();
            $table->bigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->bigInteger('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->integer('quantity_sale');
            $table->double('subtotal');
            $table->double('pricing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_details');
    }
}
