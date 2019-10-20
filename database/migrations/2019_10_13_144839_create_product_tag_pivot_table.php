<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::create('product_tag', function (Blueprint $table) {
                // create product_id column
                // ! make sure to use the same column type
                //   as in the referenced column
                //   e.g. integer or bigInteger
                $table->bigInteger('product_id')
                    ->unsigned()
                    ->nullable();
                // make product_id column a foreign key
                $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');
                // create tag_id column
                // ! make sure to use the same column type
                //   as in the referenced column
                //   e.g. integer or bigInteger
                $table->bigInteger('tag_id')
                    ->unsigned()
                    ->nullable();
                // make tag_id column a foreign key
                $table->foreign('tag_id')
                    ->references('id')
                    ->on('tags')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('product_tag');
    }
}
