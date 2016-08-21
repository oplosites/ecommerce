<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable;
            $table->string('created_by');
            $table->string('updated_by')->nullable;
            $table->timestamps();
        });

        Schema::create('provinces', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable;
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('created_by');
            $table->string('updated_by')->nullable;
            $table->timestamps();
        });

        Schema::create('cities', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable;
            $table->integer('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->string('created_by');
            $table->string('updated_by')->nullable;
            $table->timestamps();
        });

        Schema::create('users_info', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('user_address');
            $table->string('user_phone');
            $table->date('user_birth_date');
            $table->string('user_sex');

            $table->integer('user_city_id')->unsigned();
            $table->foreign('user_city_id')->references('id')->on('cities');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->longtext('shipment_address');
            $table->string('shipment_phone');
            $table->string('shipment_pic');

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
        Schema::drop('users_info');
        Schema::drop('cities');
        Schema::drop('provinces');
        Schema::drop('countries');
    }
}
