<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_name',100);
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('product_category_id')->unsigned();
            $table->string('product_slug');
            $table->string('product_description',1000)->nullable();
            $table->string('product_image');
            $table->double('product_price');
            $table->double('product_discount')->default(0);
            $table->char('featured')->default(0);
            $table->timestamps();
            $table->foreign('brand_id')->references('brand_id')->on('brands')->onDelete('cascade');
            $table->foreign('product_category_id')->references('product_category_id')->on('product_categories')->onDelete('cascade');
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
}
