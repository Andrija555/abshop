<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')
              ->references('id')->on('orders')
              ->onUpdate('cascade')->onDelete('set null');
              $table->integer('product_id')->unsigned()->nullable();
              $table->foreign('product_id')
                ->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('set null');
                $table->integer('quantity')->unsigned();

        });

    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
