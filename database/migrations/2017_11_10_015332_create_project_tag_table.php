<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('project_tag', function (Blueprint $table) {
        $table->integer('tag_id')->unsigned()->nullable();
        $table->foreign('tag_id')->references('id')->on('tags');
        $table->integer('project_id')->unsigned()->nullable();
        $table->foreign('project_id')->references('id')->on('projects');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_tag');
    }
}
