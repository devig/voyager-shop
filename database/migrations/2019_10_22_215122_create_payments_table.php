<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('token')->nullable()->unique();

            $table->integer('amount');
            $table->string('payment_method')->nullable();
            $table->string('stripe_id');
            $table->string('state');

            // create project_id column
            // ! make sure to use the same column type
            //   as in the referenced column
            //   e.g. integer or bigInteger
            $table->bigInteger('project_id')
                ->unsigned()
                ->nullable();
            // make project_id column a foreign key
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');

            // create user_id column
            // ! make sure to use the same column type
            //   as in the referenced column
            //   e.g. integer or bigInteger
            $table->bigInteger('user_id')
                ->unsigned()
                ->nullable();
            // make user_id column a foreign key
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            // create currency_id column
            // ! make sure to use the same column type
            //   as in the referenced column
            //   e.g. integer or bigInteger
            $table->bigInteger('currency_id')
                ->unsigned()
                ->nullable();
            // make currency_id column a foreign key
            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onDelete('cascade');

            // create order_id column
            // ! make sure to use the same column type
            //   as in the referenced column
            //   e.g. integer or bigInteger
            $table->bigInteger('order_id')
                ->unsigned()
                ->nullable();
            // make order_id column a foreign key
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            // create product_variant_id column
            // ! make sure to use the same column type
            //   as in the referenced column
            //   e.g. integer or bigInteger
            $table->bigInteger('product_variant_id')
                ->unsigned()
                ->nullable();
            // make product_variant_id column a foreign key
            $table->foreign('product_variant_id')
                ->references('id')
                ->on('product_variants')
                ->onDelete('cascade');

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
        Schema::dropIfExists('payments');
    }
}
