<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('ref_typeArticle');
            $table->string('titre');
            $table->text('description');
            $table->string('image');
            $table->timestamps();

            $table->foreign('ref_typeArticle')
                ->references('id')
                ->on('typearticles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
