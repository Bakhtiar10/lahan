<?php

use Illuminate\Database\Seeder;

class LahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_lahan = [
            [
                'id_penjual' => 2,
                'judul_lahan' => 'Lahan Pertama',
                'luas_lahan' => '1000',
                'harga_lahan' => 200000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '083841005309',
                'jenis_lahan' => 'Lahan Kavling',
                'alamat' => 'Jl. Lahan Pertama',
                'kecamatan' => 'Tegal Timur',
                'latitude' => '-6.868025977626829',
                'longitude' => '109.14650410088603',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Deskripsi dari lahan pertama'
            ],
            [
                'id_penjual' => 2,
                'judul_lahan' => 'Lahan Kedua',
                'luas_lahan' => '200',
                'harga_lahan' => 170000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '083841005309',
                'jenis_lahan' => 'Lahan Pertanian',
                'alamat' => 'Jl. Lahan Kedua',
                'kecamatan' => 'Tegal Barat',
                'latitude' => '-6.879107510768705',
                'longitude' => '109.13941374084521',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Deskripsi Lahan Kedua'
            ],

        ];

        foreach($data_lahan as $lahan){
            DB::table('lahan')->insert($lahan);
        }
    }
}
