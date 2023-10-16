<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name', 50);
            $table->timestamp('product_productiondate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('product_expirationdate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->double('product_costprice', 9, 2);
            $table->bigInteger('product_quantity')->unsigned();
            $table->string('product_image', 15);
            $table->string('product_desc', 200);
            $table->bigInteger('prosize_id')->unsigned()->index()->nullable();
            $table->bigInteger('prostyle_id')->unsigned()->index()->nullable();
            $table->bigInteger('protype_id')->unsigned()->index()->nullable();
            $table->foreign('prosize_id')->references('prosize_id')->on('product_sizes')->onDelete('cascade');
            $table->foreign('prostyle_id')->references('prostyle_id')->on('product_styles')->onDelete('cascade');
            $table->foreign('protype_id')->references('protype_id')->on('product_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
