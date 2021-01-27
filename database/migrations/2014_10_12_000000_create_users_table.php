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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('id_verified')->default(false);
            $table->boolean('us_person')->default(false);;
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('house_number')->nullable();
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
