<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_purchase', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('currency_id')->unsigned()->index();
            $table->foreign('currency_id')->references('id')->on('currency')->onDelete('cascade');
            $table->string('payment');
            $table->decimal('course');
            $table->integer('amount');
            $table->integer('total');
            $table->text('message')->nullable();
            $table->boolean('status_trust')->default(0);
            $table->boolean('status_moderation')->default(0);
            $table->boolean('status_admin')->default(0);
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
        Schema::drop('request');
    }
}
