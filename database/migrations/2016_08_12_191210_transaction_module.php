<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactionModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tx_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');

            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('cart_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');

            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('invoice_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');

            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('quantity');
            $table->float('discount');

            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('symbol');

            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('payment_methods', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('description')->nullable();
            $table->string('account_number');
            $table->string('on_behalf');

            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');

            $table->float('tax');

            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_info_id')->unsigned();
            $table->foreign('user_info_id')->references('id')->on('user_info');

            $table->integer('tx_status_id')->unsigned();
            $table->foreign('tx_status_id')->references('id')->on('tx_statuses');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');

            $table->integer('currency_id')->unsigned();
            $table->foreign('currency_id')->references('id')->on('currencies');

            $table->integer('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');

            $table->integer('total_payment');
            $table->integer('total_tax');

            $table->string('created_by');
            $table->string('updated_by')->nullable();
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
        Schema::drop('transactions');
        Schema::drop('payment_methods');
        Schema::drop('settings');
        Schema::drop('currencies');
        Schema::drop('orders');
        Schema::drop('tx_statuses');
        Schema::drop('cart_statuses');
        Schema::drop('invoice_statuses');
    }
}
