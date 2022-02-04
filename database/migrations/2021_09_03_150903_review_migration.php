<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReviewMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews',function (Blueprint $blueprint){
           $blueprint->increments('id');
           $blueprint->integer('customer_id');
           $blueprint->integer('product_id');
           $blueprint->string('rating');
           $blueprint->string('review');
           $blueprint->timestamps();

        });
        //
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
