<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rumah_type_model;

class rumah_type_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rumah_type_model::create([
            'label' => 'Angrek',
            'typerumah' => '36/90',
            'luas' => 90,
            'gambar1' => '',
            'gambar2' => '',
            'gambar3' => '',
            'keterangan' => '',
            'spesifikasi' => '',
            'cicilan5' => 5,
            'cicilan10' => 10,
            'cicilan15' => 15,
            'cicilan20' => 20,
        ]);

        rumah_type_model::create([
            'label' => 'Kenanga',
            'typerumah' => '36/90',
            'luas' => 90,
            'gambar1' => '',
            'gambar2' => '',
            'gambar3' => '',
            'keterangan' => '',
            'spesifikasi' => '',
            'cicilan5' => 5,
            'cicilan10' => 10,
            'cicilan15' => 15,
            'cicilan20' => 20,
        ]);
    }
}
