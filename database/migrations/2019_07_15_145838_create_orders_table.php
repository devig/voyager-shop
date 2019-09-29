<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::create('orders', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('token');

                $table->enum('state', config('voyager-shop.order_states'))->default('cart');

                // create user_id
                $table->bigInteger('user_id')
                    ->unsigned()
                    ->nullable();
                // make user_id column a foreign key
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
            Schema::dropIfExists('orders');
        });
    }
}
