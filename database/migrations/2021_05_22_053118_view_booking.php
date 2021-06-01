<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ViewBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("
        create view vw_bookingStatus as
        select 
        b.id, b.id_user , rt.label, rd.alamat , b.harga_cicilan , b.jumlah_cicilan , u.name , u2.name as admin, 
                case 
                    when b.status = 0 and (select COUNT(*) from booking b2 where b2.id_rumah_detail = b.id_rumah_detail and b2.status = 1) = 0 then 0
                    when b.status = 1 and (select COUNT(*) from booking b2 where b2.id_rumah_detail = b.id_rumah_detail and b2.status = 1) = 1 then 1
                    when b.status = 0 and (select COUNT(*) from booking b2 where b2.id_rumah_detail = b.id_rumah_detail and b2.status = 1) > 0 then 2
                    when b.status = 2 then 2
                    when b.status = 3 then 3
                end as status_booking, b.harga_dp, b.bukti 
            from 
                booking b
                inner join rumah_detail rd on b.id_rumah_detail = rd.id 
                inner join rumah_type rt on rd.id_rumah_type = rt.id 
                inner join users u on b.id_user = u.id 
                LEFT join users u2 on b.id_admin = u2.id 
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vw_bookingStatus');
    }
}
