<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->boolean('is_admin')->default(false);
            $table->unsignedInteger('ref_sexe')->nullable();
            $table->unsignedInteger('ref_pays')->nullable();

            $table->foreign('ref_sexe')
                ->references('id')
                ->on('sexe')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ref_pays')
                ->references('id')
                ->on('pays')
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
        Schema::dropIfExists('users');
    }
}
