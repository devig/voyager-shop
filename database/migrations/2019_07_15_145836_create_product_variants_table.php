<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::create('product_variants', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('name');
                $table->text('details');
                $table->integer('price');

                // create tax_id
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
            Schema::dropIfExists('product_variants');
        });
    }
}
