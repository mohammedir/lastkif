<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('keyTyp')->nullable();
            $table->string('namePage');
            $table->string('pagelink')->nullable();
            $table->integer('Status');
            $table->string('Pagetitle')->nullable();
            $table->string('Metatitle')->nullable();
            $table->string('Metadescription')->nullable();
            $table->text('Metakeywords')->nullable();
            $table->text('staticpages')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
