<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->integer('ddi')->nullable();
            $table->integer('ddn')->nullable();
            $table->integer('telephone');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            //FK
            /*$table->bigInteger('role_id')->nullable()->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->unsigned();
            $table->bigInteger('city_id')->nullable()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->unsigned();*/
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
        Schema::dropIfExists('users');
    }
}
