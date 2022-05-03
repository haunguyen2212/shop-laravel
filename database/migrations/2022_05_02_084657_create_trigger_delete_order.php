<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerDeleteOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER delete_order AFTER DELETE ON orders FOR EACH ROW
        BEGIN
    	    UPDATE statistical SET sales=sales-OLD.total, total_order=total_order-1 WHERE order_date=LEFT(OLD.order_date, 10);  
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER delete_order');
    }
}
