<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::create('order_items', function (Blueprint $table) {
                $table->bigIncrements('id');

                // create order_id
                $table->bigInteger('order_id')
                    ->unsigned()
                    ->nullable();
                // make order_id column a foreign key
                $table->foreign('order_id')
                    ->references('id')
                    ->on('orders')
                    ->onDelete('cascade');

                // create product_id
                $table->bigInteger('product_id')
                    ->unsigned()
                    ->nullable();
                // make product_id column a foreign key
                $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');

                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(function () {
            Schema::dropIfExists('order_items');
        });
    }
}
