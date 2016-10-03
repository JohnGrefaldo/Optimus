<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->integer('age');
            $table->char('gender', 6);
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('zip');
            $table->integer('rank',1);
            $table->integer('avg_open_rate');
            $table->integer('avg_click_rate');
            //$table->string('list_id')->unique();
            $table->string('list_id');
            $table->foreign('list_id')->references('id')->on('lists');
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
        Schema::drop('subscribers');
    }
}
