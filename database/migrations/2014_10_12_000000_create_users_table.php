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
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->longtext('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');

            $table->string('shipment_full_name');
            $table->string('shipment_phone_number');
            $table->longtext('shipment_address');
            $table->string('shipment_city');
            $table->string('shipment_province');
            $table->string('shipment_postal_code');

            $table->string('created_by');
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->integer('user_info_id')->unsigned()->nullable();
            $table->foreign('user_info_id')->references('id')->on('user_info');

            $table->rememberToken();

            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->string('description');

            $table->timestamps();
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_roles');
        Schema::drop('users');
        Schema::drop('roles');
    }
}
