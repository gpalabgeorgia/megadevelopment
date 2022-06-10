<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_filter', function (Blueprint $table) {
            $table->id();
            $table->string('project')->nullable();
            $table->string("floor")->nullable();
            $table->string("meter")->nullable();
            $table->string("position")->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('images')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('project_filter');
    }
}
