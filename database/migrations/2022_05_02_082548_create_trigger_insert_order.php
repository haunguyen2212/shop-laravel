<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerInsertOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER insert_order AFTER INSERT ON orders FOR EACH ROW
            BEGIN
                DECLARE total_products INT DEFAULT 0;
                SELECT count(order_date) INTO total_products FROM statistical WHERE order_date = CURDATE();
                IF(total_products>0) THEN
    	            UPDATE statistical SET sales=sales+NEW.total, total_order=total_order+1 WHERE order_date=CURDATE();
                ELSE
    	            INSERT INTO statistical (order_date,sales,quantity,total_order) VALUES (CURDATE(),NEW.total,0,1);
                END IF;
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER insert_order');
    }
}
