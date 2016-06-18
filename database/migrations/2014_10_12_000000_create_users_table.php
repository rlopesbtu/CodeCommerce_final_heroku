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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('is_admin', 1)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('CEP', 8)->nullable();
            $table->string('number', 4)->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('complement')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        \CodeCommerce\User::create([
            'name' => "Ricardo",
            'email' => "riaplopes@gmail.com",
            'password' => \Illuminate\Support\Facades\Hash::make(654123),
            'is_admin' => 1,
            'address' => "Av. Maria Nazareth Roseiro",
            'CEP' => "18611580",
            'number' => "477",
            'district' => "Botucatu",
            'state' => "SP",
            'complement' => "casa",
        ]);
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
