<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerDeleteOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER delete_order_detail AFTER DELETE ON order_details FOR EACH ROW
        BEGIN
            UPDATE product_details SET product_detail_quantity=product_detail_quantity+OLD.quantity
            WHERE product_detail_id = OLD.product_detail_id;
            UPDATE statistical SET quantity=quantity-OLD.quantity WHERE order_date = LEFT(OLD.created_at,10);
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER delete_order_detail');
    }
}
