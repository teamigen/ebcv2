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
        Schema::create("products",function(Blueprint $table){
            $table->id();
                $table->string("productName");
                $table->string("productRate");
                $table->bigInteger("productParamaterId");
                $table->string("productPieces");
                $table->string("equaionForqty");
                $table->bigInteger("taxId");
                $table->bigInteger("categoryId");
                $table->bigInteger("subCategoryId");
                $table->bigInteger("producttypeId");
                $table->string("printerId");
                $table->string("image");
                $table->string("relatedProducts");
                $table->bigInteger("initialStock");
                $table->bigInteger("initialStockRate");
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
