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
        Schema::create("customerdetails",function(Blueprint $table){
            $table->id('joborderId');
            $table->string('customerPhone');
            $table->string('customerName');
            $table->string('email');
            $table->string('address');
            $table->bigInteger('customerTypeId');
            $table->bigInteger('sourceId');
            $table->bigInteger('taxId');
            $table->string('enquiryData');
            $table->tinyInteger('joborderStatus')->default('0');    
            $table->tinyInteger('isActive')->default('1');    
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
};
