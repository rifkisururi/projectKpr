<?php

namespace Database\Seeders;


use App\Models\akun_kas_model;

use Illuminate\Database\Seeder;

class akunkas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        akun_kas_model::create([
            'kode' => '001',
            'nama' => 'fee booking',
            'type' => 1
        ]);
    }
}
