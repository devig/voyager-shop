<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('name');
                $table->text('description');

                $table->integer('price');
                $table->boolean('includes_tax');

                // create tax_id
                $table->bigInteger('tax_id')
                    ->unsigned()
                    ->nullable();
                // make tax_id column a foreign key
                $table->foreign('tax_id')
                    ->references('id')
                    ->on('taxes')
                    ->onDelete('cascade');

                // create project_id
                $table->bigInteger('project_id')
                    ->unsigned()
                    ->nullable();
                // make project_id column a foreign key
                $table->foreign('project_id')
                    ->references('id')
                    ->on('projects')
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
            Schema::dropIfExists('products');
        });
    }
}
