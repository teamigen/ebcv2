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
        Schema::create("productcomponents",function(Blueprint $table){
            $table->id();
            $table->bigInteger("productId");
            $table->bigInteger("rawProductId");
            $table->bigInteger("rawQuantyNum");
            $table->bigInteger("rawRate");
            
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
