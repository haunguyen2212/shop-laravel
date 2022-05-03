<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerInsertOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER insert_order_detail AFTER INSERT ON order_details FOR EACH ROW
            BEGIN
                UPDATE product_details SET product_detail_quantity=product_detail_quantity-NEW.quantity
                WHERE product_detail_id = NEW.product_detail_id;
                UPDATE statistical SET quantity=quantity+NEW.quantity WHERE order_date = CURDATE();
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER insert_order_detail');
    }
}
