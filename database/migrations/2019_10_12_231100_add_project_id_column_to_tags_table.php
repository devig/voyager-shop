<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectIdColumnToTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // don't execute if tags or projects are not available
        if (!Schema::hasTable('tags') || !Schema::hasTable('projects')) {
            return;
        }

        Schema::table('tags', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropColumn(['project_id']);
        });
    }
}
