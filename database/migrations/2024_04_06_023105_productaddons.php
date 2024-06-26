<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("productaddons",function(Blueprint $table){
            $table->id();
            $table->bigInteger("productId");
            $table->bigInteger("addOnId");
            $table->bigInteger("rate");
            $table->bigInteger("minRate");
            
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
};
