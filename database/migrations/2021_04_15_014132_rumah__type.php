<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RumahType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah_type', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
            $table->string('typerumah');
            $table->integer('luas');
            $table->string('keterangan');
            $table->string('spesifikasi');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('gambar3');
            $table->integer('cicilan5');
            $table->integer('cicilan10');
            $table->integer('cicilan15');
            $table->integer('cicilan20');
            $table->integer('harga_dp');
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
        Schema::dropIfExists('rumah_type');
    }
}
