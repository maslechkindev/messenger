<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'MyIsam';
            $table->increments('id')->unsigned();;
            $table->integer('id_role');
            $table->string('name')->default(null);
            $table->string('lastname')->default(null);
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
