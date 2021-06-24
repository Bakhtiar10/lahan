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
                'judul_lahan' => 'Lahan Kavling Slawi 2',
                'luas_lahan' => '176',
                'harga_lahan' => 175000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085742005389',
                'jenis_lahan' => 'Lahan Kavling',
                'alamat' => 'Kalisapu, Kecamatan Slawi Kabupaten Tegal',
                'kecamatan' => 'Slawi',
                'latitude' => '-6.9765397252284345',
                'longitude' => '109.1339762856295',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Kavling slawi 2, Siap bangun, Lokasi sangat strategis, harga nego sewajarnya'
            ],
            [
                'id_penjual' => 2,
                'judul_lahan' => 'Lahan Kavling Slawi 1',
                'luas_lahan' => '200',
                'harga_lahan' => 130000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085742005389',
                'jenis_lahan' => 'Lahan Kavling',
                'alamat' => 'Kalisapu, Kecamatan Slawi Kabupaten Tegal',
                'kecamatan' => 'Slawi',
                'latitude' => '-6.9765397252284300',
                'longitude' => '109.1339762856295',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Kavling slawi 1, Siap bangun, Lokasi sangat strategis, harga nego sewajarnya'
            ],
            [
                'id_penjual' => 2,
                'judul_lahan' => 'Dijual tanah kavling harga bersahabat',
                'luas_lahan' => '112',
                'harga_lahan' => 60000000,
                'sertifikat' => 'HGB - Hak Guna Bangun',
                'no_hp' => '085742005389',
                'jenis_lahan' => 'Lahan Kavling',
                'alamat' => 'Desa Danawarih Kecamatan Balapulang',
                'kecamatan' => 'Balapulang',
                'latitude' => '-7.028925784333808',
                'longitude' => '109.15104996960775',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Dijual lahan kavling, Lokasi di perkampungan, Akses jalan lebar bisa masuk mobil.'
            ],
            [
                'id_penjual' => 2,
                'judul_lahan' => 'Jual murah tanah kavling',
                'luas_lahan' => '178',
                'harga_lahan' => 178000000,
                'sertifikat' => 'HP - Hak Pakai',
                'no_hp' => '085742005389',
                'jenis_lahan' => 'Lahan Kavling',
                'alamat' => 'Balapulang',
                'kecamatan' => 'Balapulang',
                'latitude' => '-7.03234535458661',
                'longitude' => '109.13525819853862',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Di Jual tanah kavling lokasi di Balapulang, Dekat dengan sekolah'
            ],
            [
                'id_penjual' => 3,
                'judul_lahan' => 'Lahan Kebun jati',
                'luas_lahan' => '8000',
                'harga_lahan' => 700000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085213276703',
                'jenis_lahan' => 'Lahan Perkebunan',
                'alamat' => 'Desa Pager Kasih Kecamatan Bumijawa',
                'kecamatan' => 'Bumijawa',
                'latitude' => '-7.16219456571902',
                'longitude' => '109.10337444622559',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Di Jual lahan kebun jati, Lokasi di depan jalan, ada akses air'
            ],
            [
                'id_penjual' => 3,
                'judul_lahan' => 'Lahan Pekarangan / lahan perkebunan',
                'luas_lahan' => '4420',
                'harga_lahan' => 260000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085213276703',
                'jenis_lahan' => 'Lahan Perkebunan',
                'alamat' => 'Desa sidamulya kecamatan lebaksiu',
                'kecamatan' => 'Lebaksiu',
                'latitude' => '-7.005253421100022',
                'longitude' => '109.13010934878236',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Tanah Tegalan atau tanah pekarangan, tanah tidak datar sudah SHM, Kontur tanah miring dan sangat subur.'
            ],
            [
                'id_penjual' => 3,
                'judul_lahan' => 'Tanah Sawah atau perkebunan',
                'luas_lahan' => '3520',
                'harga_lahan' => 185000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085213276703',
                'jenis_lahan' => 'Lahan Perkebunan',
                'alamat' => 'Desa Jatilawang',
                'kecamatan' => 'Margasari',
                'latitude' => '-7.08538264573933',
                'longitude' => '109.07744149861469',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Tanah sawah atau perkebunan dekat dengan sungai'
            ],
            [
                'id_penjual' => 3,
                'judul_lahan' => 'Jual tanah kebun murah dekat pasar, dekat sekolah',
                'luas_lahan' => '1405',
                'harga_lahan' => 350000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085213276703',
                'jenis_lahan' => 'Lahan Perkebunan',
                'alamat' => 'Desa kedungsukun, Kecamatan Adiwerna',
                'kecamatan' => 'Adiwerna',
                'latitude' => '-6.923461140877848',
                'longitude' => '109.12118646138816',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Di jual tanah kebun, Akses masuk 50 M dari jalan desa'
            ],
            [
                'id_penjual' => 4,
                'judul_lahan' => 'Di Jual tanah pertanian, Jual murah',
                'luas_lahan' => '1589',
                'harga_lahan' => 85000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085226591596',
                'jenis_lahan' => 'Lahan Pertanian',
                'alamat' => 'Kabupaten Tegal',
                'kecamatan' => 'Slawi',
                'latitude' => '-6.959702479634686',
                'longitude' => '109.10671444361122',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Di Jual lahan pertanian murah, bisa nego'
            ],
            [
                'id_penjual' => 4,
                'judul_lahan' => 'Di jual tanah sawah murah',
                'luas_lahan' => '1820',
                'harga_lahan' => 265000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085226591596',
                'jenis_lahan' => 'Lahan Pertanian',
                'alamat' => 'Desa gumayun kecamatan Dukuhwaru Kabupaten Tegal',
                'kecamatan' => 'Dukuhwaru',
                'latitude' => '-6.99953207413229',
                'longitude' => '109.11888409488239',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Di jual tanah sawah murah, hak milik pribadi, Lokasi dekat dengan penduduk, Akses mudah.'
            ],
            [
                'id_penjual' => 4,
                'judul_lahan' => 'Di jual tanah sawah cocok untuk investasi, lokasi strategis',
                'luas_lahan' => '3154',
                'harga_lahan' => 270000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085226591596',
                'jenis_lahan' => 'Lahan Pertanian',
                'alamat' => 'Desa bongkok kecamatan kramat',
                'kecamatan' => 'Kramat',
                'latitude' => '-7.024136748589271',
                'longitude' => '109.08528951815907',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Di jual tanah sawah dekat dengan jalan, lokasi strategis, harga murah dan terjangkau, sertifikat hak milik pajak hidup.'
            ],
            [
                'id_penjual' => 4,
                'judul_lahan' => 'Di jual tanah bekas sawah',
                'luas_lahan' => '3588',
                'harga_lahan' => 3500000000,
                'sertifikat' => 'SHM - Sertifikat Hak Milik',
                'no_hp' => '085226591596',
                'jenis_lahan' => 'Lahan Pertanian',
                'alamat' => 'Kota Tegal',
                'kecamatan' => 'Tegal Barat',
                'latitude' => '-6.866969448087019',
                'longitude' => '109.14878778502828',
                'status_jual' => 0,
                'status_lahan' => 0,
                'deskripsi' => 'Di jual cepat, tanah bekas sawah, dekat dengan akses umum, tanpa perantara, Harga bisa nego.'
            ],
            

        ];

        foreach($data_lahan as $lahan){
            DB::table('lahan')->insert($lahan);
        }
    }
}
