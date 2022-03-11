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
            $table->integer('brand_id')->unsigned();
            $table->integer('product_category_id')->unsigned();
            $table->string('product_slug');
            $table->string('product_description',1000)->nullable();
            $table->string('product_image');
            $table->double('product_price');
            $table->double('product_discount')->default(0);
            $table->char('featured')->default(0);
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
        Schema::dropIfExists('products');
    }
}
