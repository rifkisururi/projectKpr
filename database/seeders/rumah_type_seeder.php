<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rumah_type;

class rumah_type_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rumah_type::create([
            'label' => 'Angrek',
            'typerumah' => '36/90',
            'luas' => 90,
            'gambar1' => '',
            'gambar2' => '',
            'gambar3' => '',
            'keterangan' => '',
            'spesifikasi' => ''
        ]);

        rumah_type::create([
            'label' => 'Kenanga',
            'typerumah' => '36/90',
            'luas' => 90,
            'gambar1' => '',
            'gambar2' => '',
            'gambar3' => '',
            'keterangan' => '',
            'spesifikasi' => ''
        ]);
    }
}
