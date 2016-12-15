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
            $table->increments('id');
            $table->string('type')->default('Guest');
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->string('companyName', 100);
            $table->string('email')->unique();
            $table->string('password', 60);

            $table->string('streetName', 100)->nullable();
            $table->string('houseNumber', 11)->nullable();
            $table->string('zipCode', 10)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();

            $table->string('phone', 30)->nullable();
            $table->string('mobile', 30)->nullable();

            $table->integer('kvk')->nullable()->unique();
            $table->string('btw', 30)->nullable()->unique();

            $table->date('ending_on')->nullable();
            $table->string('pic', 255)->nullable();

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
