<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VwRumahStatus extends Migration
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
        create view vw_statusRumah as
        select 
            rd.id , rd.alamat , 
            ( select COUNT(*) from booking b where b.id_rumah_detail= rd.id and status = 2) as jumlahSukses, 
            ( select COUNT(*) from booking b where b.id_rumah_detail= rd.id and status = 0) as JumlahBooking ,
            case 
                when ( select COUNT(*) from booking b where b.id_rumah_detail= rd.id and status = 1) > 0 then 2
                when ( select COUNT(*) from booking b where b.id_rumah_detail= rd.id and status = 0) > 0 then 1
                else 0
            end as status,
            rt.label,
            rd.id_rumah_type
        from rumah_detail rd
        inner join rumah_type rt on rd.id_rumah_type = rt.id 
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vw_statusRumah');
    }
}
