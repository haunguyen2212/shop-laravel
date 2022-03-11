<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('order_id',40)->primary();
            $table->integer('customer_id')->unsigned();
            $table->string('customer_name');
            $table->string('customer_phone',30);
            $table->string('customer_address');
            $table->integer('total')->default(0);
            $table->dateTime('order_date', $precision = 0);
            $table->dateTime('delivery_date', $precision = 0);
            $table->string('payment_type')->default('Thanh toán khi nhận hàng');
            $table->char('payment_status')->default('0');
            $table->char('order_status',1)->default('0');
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
        Schema::dropIfExists('orders');
    }
}
