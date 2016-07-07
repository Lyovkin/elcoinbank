<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('wallet_id')->unsigned()->index();
            $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
            $table->integer('amount');
            $table->integer('total');
            $table->text('message')->nullable();
            $table->boolean('status_moderation');
            $table->boolean('status_admin');
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
        //
    }
}
