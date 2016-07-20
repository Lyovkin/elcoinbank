<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function(Blueprint $table) {
           $table->increments('id');
           $table->integer('currency_id')->unsigned()->index();
           $table->foreign('currency_id')->references('id')->on('currency')->onDelete('cascade');
           $table->decimal('course_purchase', 8, 5);
           $table->string('wallet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course');
    }
}
