<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bdh;
use App\Models\hhk;
use App\Models\Rph;
use App\Models\hhbk;
use App\Models\izin;
use App\Models\pnbp;
use App\Models\User;
use App\Models\petak;
use App\Models\rosak;
use App\Models\dataTegak;
use App\Models\dataUtama;
use App\Models\LuasHutan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'password' => bcrypt('123'),
            'user_type' => 'admin'
        ]);

        User::create([
            'id' => 2,
            'name' => 'Juan',
            'password' => bcrypt('123')
        ]);

        Bdh::create([
            'id_bdh' => 1,
            'nama_bdh' => 'Bantul',
            'kepala_bdh' => 'Mas Dani',
            'luas_bdh' => 456.85
        ]);
        
        Bdh::create([
            'id_bdh' => 2,
            'nama_bdh' => 'Sleman',
            'kepala_bdh' => 'Mas Tutu',
            'luas_bdh' => 789.85
        ]);

        Bdh::create([
            'id_bdh' => 3,
            'nama_bdh' => 'Gunung Kidul',
            'kepala_bdh' => 'Mas Camavinga',
            'luas_bdh' => 987.85
        ]);

        Bdh::create([
            'id_bdh' => 4,
            'nama_bdh' => 'Wonosari',
            'kepala_bdh' => 'Mas Pendu',
            'luas_bdh' => 654.85

        ]);
        Bdh::create([
            'id_bdh' => 5,
            'nama_bdh' => 'Kulonprogo',
            'kepala_bdh' => 'Mas Ronal',
            'luas_bdh' => 321.85
        ]);

        Rph::create([
            'id_rph' => 1,
            'nama_rph' => 'Ngaglik',
            'kepala_rph' => 'Puh Sepuh',
            'luas_rph' => 12.98,
            'id_bdh' => 1
        ]);
        
        Rph::create([
            'id_rph' => 2,
            'nama_rph' => 'Jragem',
            'kepala_rph' => 'Mas Noel',
            'luas_rph' => 34.98,
            'id_bdh' => 2
        ]);

        Rph::create([
            'id_rph' => 3,
            'nama_rph' => 'Kaliurang',
            'kepala_rph' => 'Mas Revan',
            'luas_rph' => 56.98,
            'id_bdh' => 3
        ]);

        Rph::create([
            'id_rph' => 4,
            'nama_rph' => 'Pogung',
            'kepala_rph' => 'FazPud',
            'luas_rph' => 78.98,
            'id_bdh' => 4
        ]);

        Rph::create([
            'id_rph' => 5,
            'nama_rph' => 'Kasihan',
            'kepala_rph' => 'Mas Setiawan',
            'luas_rph' => 90.98,
            'id_bdh' => 5
        ]);
        
        Rph::create([
            'id_rph' => 6,
            'nama_rph' => 'Gowok',
            'kepala_rph' => 'Titut',
            'luas_rph' => 09.98,
            'id_bdh' => 5
        ]);
        Rph::create([
            'id_rph' => 7,
            'nama_rph' => 'Seturan',
            'kepala_rph' => 'Mas Sutarman',
            'luas_rph' => 87.98,
            'id_bdh' => 4
        ]);
        Rph::create([
            'id_rph' => 8,
            'nama_rph' => 'Wates',
            'kepala_rph' => 'Mas Namratus',
            'luas_rph' => 65.98,
            'id_bdh' => 3
        ]);
        Rph::create([
            'id_rph' => 9,
            'nama_rph' => 'Imogiri',
            'kepala_rph' => 'Incik Bos',
            'luas_rph' => 43.98,
            'id_bdh' => 2
        ]);
        Rph::create([
            'id_rph' => 10,
            'nama_rph' => 'Kretek',
            'kepala_rph' => 'Mas Empak Ratus',
            'luas_rph' => 21.98,
            'id_bdh' => 1
        ]);

        hhk::create([
            'id_hhk' => 1,
            'koreksi' => 0.70,
            'jenis_tgk' => "Jati" 
        ]);
        hhk::create([
            'id_hhk' => 2,
            'koreksi' => 0.60,
            'jenis_tgk' => "Mahoni" 
        ]);
        hhk::create([
            'id_hhk' => 3,
            'koreksi' => 0.60,
            'jenis_tgk' => "Akasia" 
        ]);
        hhk::create([
            'id_hhk' => 4,
            'koreksi' => 0.60,
            'jenis_tgk' => "Sonokeling" 
        ]);
        hhk::create([
            'id_hhk' => 5,
            'koreksi' => 0.60,
            'jenis_tgk' => "Pinus" 
        ]);
        hhk::create([
            'id_hhk' => 6,
            'koreksi' => 0.60,
            'jenis_tgk' => "Kayu Putih" 
        ]);
        hhk::create([
            'id_hhk' => 7,
            'koreksi' => 0.60,
            'jenis_tgk' => "Rumba Campus" 
        ]);
        hhk::create([
            'id_hhk' => 8,
            'koreksi' => 0.60,
            'jenis_tgk' => "Sengon" 
        ]);
        hhk::create([
            'id_hhk' => 9,
            'koreksi' => 0.60,
            'jenis_tgk' => "Eucalyptus" 
        ]);
        hhk::create([
            'id_hhk' => 10,
            'koreksi' => 0.60,
            'jenis_tgk' => "Nyamplung" 
        ]);

        hhbk::create([
            'id_hhbk' => 1,
            'jenis_tgk' =>  "Kayu Putih"
        ]);
        hhbk::create([
            'id_hhbk' => 2,
            'jenis_tgk' =>  "Wisata Alam"
        ]);
        hhbk::create([
            'id_hhbk' => 3,
            'jenis_tgk' =>  "Sumber Air"
        ]);

        petak::create([
            'id_ptk' => 1,
            'nomor_ptk' => 1,
            'luas_ptk' => 321,
            'id_hhk' => 2,
            'id_rph' => 1
        ]);
        petak::create([
            'id_ptk' => 2,
            'nomor_ptk' => 2,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 2,
            'id_rph' => 1
        ]);
        petak::create([
            'id_ptk' => 3,
            'nomor_ptk' => 3,
            'luas_ptk' => 321,
            'id_hhk' => 1,
            'id_rph' => 2
        ]);
        petak::create([
            'id_ptk' => 4,
            'nomor_ptk' => 4,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 1,
            'id_rph' => 2
        ]);
        petak::create([
            'id_ptk' => 5,
            'nomor_ptk' => 5,
            'luas_ptk' => 321,
            'id_hhk' => 3,
            'id_rph' => 3
        ]);
        petak::create([
            'id_ptk' => 6,
            'nomor_ptk' => 6,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 3,
            'id_rph' => 3
        ]);
        petak::create([
            'id_ptk' => 7,
            'nomor_ptk' => 7,
            'luas_ptk' => 321,
            'id_hhk' => 4,
            'id_rph' => 4
        ]);
        petak::create([
            'id_ptk' => 8,
            'nomor_ptk' => 8,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 1,
            'id_rph' => 4
        ]);
        petak::create([
            'id_ptk' => 9,
            'nomor_ptk' => 9,
            'luas_ptk' => 321,
            'id_hhk' => 5,
            'id_rph' => 5
        ]);
        petak::create([
            'id_ptk' => 10,
            'nomor_ptk' => 10,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 2,
            'id_rph' => 5
        ]);
        petak::create([
            'id_ptk' => 11,
            'nomor_ptk' => 11,
            'luas_ptk' => 321,
            'id_hhk' => 6,
            'id_rph' => 6
        ]);
        petak::create([
            'id_ptk' => 12,
            'nomor_ptk' => 12,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 2,
            'id_rph' => 6
        ]);
        petak::create([
            'id_ptk' => 13,
            'nomor_ptk' => 13,
            'luas_ptk' => 321,
            'id_hhk' => 7,
            'id_rph' => 7
        ]);
        petak::create([
            'id_ptk' => 14,
            'nomor_ptk' => 14,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 3,
            'id_rph' => 7
        ]);
        petak::create([
            'id_ptk' => 15,
            'nomor_ptk' => 15,
            'luas_ptk' => 321,
            'id_hhk' => 8,
            'id_rph' => 8
        ]);
        petak::create([
            'id_ptk' => 16,
            'nomor_ptk' => 16,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 1,
            'id_rph' => 8
        ]);
        petak::create([
            'id_ptk' => 17,
            'nomor_ptk' => 17,
            'luas_ptk' => 321,
            'id_hhk' => 9,
            'id_rph' => 9
        ]);
        petak::create([
            'id_ptk' => 18,
            'nomor_ptk' => 18,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 2,
            'id_rph' => 9
        ]);
        petak::create([
            'id_ptk' => 19,
            'nomor_ptk' => 19,
            'luas_ptk' => 321,
            'id_hhk' => 10,
            'id_rph' => 10
        ]);
        petak::create([
            'id_ptk' => 20,
            'nomor_ptk' => 20,
            'luas_ptk' => 321,
            'potensi_ptk' => 1,
            'id_hhbk' => 3,
            'id_rph' => 10
        ]);

        izin::create([
            'id_izin' => 1,
            'nama_kelompok' => "Kaliurang",
            'no_SK' => "3",
            'id_ptk' => 16,
            'luas_izin' => 90
        ]);

        izin::create([
            'id_izin' => 2,
            'nama_kelompok' => "Sleman",
            'no_SK' => "55",
            'id_ptk' => 7,
            'luas_izin' => 56
        ]);

        izin::create([
            'id_izin' => 3,
            'nama_kelompok' => "Yogyakarta",
            'no_SK' => "5",
            'id_ptk' => 4,
            'luas_izin' => 77
        ]);

        pnbp::create([
            'id_pnbp' => 1,
            'tahun_pnbp' => 2010,
            'nominal_pnbp' => 689876
        ]);

        pnbp::create([
            'id_pnbp' => 2,
            'tahun_pnbp' => 2011,
            'nominal_pnbp' => 729298
        ]);

        pnbp::create([
            'id_pnbp' => 3,
            'tahun_pnbp' => 2012,
            'nominal_pnbp' => 829378
        ]);

        pnbp::create([
            'id_pnbp' => 4,
            'tahun_pnbp' => 2013,
            'nominal_pnbp' => 588388
        ]);

        pnbp::create([
            'id_pnbp' => 5,
            'tahun_pnbp' => 2014,
            'nominal_pnbp' => 782088
        ]);

        pnbp::create([
            'id_pnbp' => 6,
            'tahun_pnbp' => 2015,
            'nominal_pnbp' => 637899
        ]);

        pnbp::create([
            'id_pnbp' => 7,
            'tahun_pnbp' => 2016,
            'nominal_pnbp' => 578888
        ]);

        pnbp::create([
            'id_pnbp' => 8,
            'tahun_pnbp' => 2017,
            'nominal_pnbp' => 488007
        ]);

        pnbp::create([
            'id_pnbp' => 9,
            'tahun_pnbp' => 2018,
            'nominal_pnbp' => 678499
        ]);
        
        dataUtama::create([
            'id_PU' => 1,
            'tanggal' => "2023-10-06",
            'id_ptk' => 10,
            'no_PU' => 7,
            'koor_x' => -93.098734,
            'koor_y' => 70.0542324,
            'luas_PU' => 10.97,
            'tanam_sela' => "entah",
            'tahun_tanam' => 1990,
            'jarak_tanam' => "3x3",
            'umur_tgk' => 90,
            'keadaan_kes' => "Jelek",
            'kerataan_tgk' => "Agak Rata",
            'kemurnian' => "Murni",
            'bentuk_lap' => "Punggung",
            'derajat_lereng' => 23,
            'landai_lereng' => "Landai",
            'kerataan_lap' => "Berombak",
            'jns_tanah' => "Latosol",
            'kedalaman' => 93,
            'penemuan'=>"anu",
            'erosi'=>"Tidak Erosi",
            'tinggi_tempat'=>89,
            'dalaman' => "Dalam",
            'jns_bwh' => "entah",
            'kerapatan' => "Berbukit"
        ]);
        dataUtama::create([
            'id_PU' => 2,
            'tanggal' => "2023-10-06",
            'id_ptk' => 7,
            'no_PU' => 4,
            'koor_x' => -93.098734,
            'koor_y' => 70.0542324,
            'luas_PU' => 2.97,
            'tanam_sela' => "entah",
            'tahun_tanam' => 1990,
            'jarak_tanam' => "3x3",
            'umur_tgk' => 90,
            'keadaan_kes' => "Jelek",
            'kerataan_tgk' => "Agak Rata",
            'kemurnian' => "Murni",
            'bentuk_lap' => "Punggung",
            'derajat_lereng' => 23,
            'landai_lereng' => "Landai",
            'kerataan_lap' => "Berombak",
            'jns_tanah' => "Latosol",
            'kedalaman' => 93,
            'penemuan'=>"anu",
            'erosi'=>"Tidak Erosi",
            'tinggi_tempat'=>26,
            'dalaman' => "Dalam",
            'jns_bwh' => "entah",
            'kerapatan' => "Berbukit"
        ]);
        dataUtama::create([
            'id_PU' => 3,
            'tanggal' => "2023-10-06",
            'id_ptk' => 8,
            'no_PU' => 1,
            'koor_x' => -93.098734,
            'koor_y' => 70.0542324,
            'luas_PU' => 17.97,
            'tanam_sela' => "entah",
            'tahun_tanam' => 1990,
            'jarak_tanam' => "5x9",
            'umur_tgk' => 90,
            'keadaan_kes' => "Jelek",
            'kerataan_tgk' => "Agak Rata",
            'kemurnian' => "Murni",
            'bentuk_lap' => "Punggung",
            'derajat_lereng' => 23,
            'landai_lereng' => "Landai",
            'kerataan_lap' => "Berombak",
            'jns_tanah' => "Latosol",
            'kedalaman' => 93,
            'penemuan'=>"anu",
            'erosi'=>"Tidak Erosi",
            'tinggi_tempat'=>8,
            'dalaman' => "Dalam",
            'jns_bwh' => "entah",
            'kerapatan' => "Berbukit"
        ]);

        dataTegak::create([
            'id_tgk' => 1,
            'id_PU' => 1,
            'no_pohon' => 100,
            'id_hhbk' => 1,
            'diameter' => 17,
            'tinggi' => 90
        ]);

        rosak::create([
            'id_rusak' => 1,
            'jns_rusak' => 1,
            'tgl_input' => "2023-10-06",
            'tgl_rusak' => "2023-10-06",
            'id_ptk' => 1,
            'koor_x' => 90123,
            'koor_y' => 82321,
            'keterangan' => "Kurang Tau",
            'diameter' => 89
        ]);

        rosak::create([
            'id_rusak' => 3,
            'jns_rusak' => 1,
            'tgl_input' => "2023-10-06",
            'tgl_rusak' => "2023-10-06",
            'id_ptk' => 13,
            'koor_x' => 90123,
            'koor_y' => 82321,
            'keterangan' => "ppp",
            'diameter' => 11
        ]);

        rosak::create([
            'id_rusak' => 4,
            'jns_rusak' => 1,
            'tgl_input' => "2023-10-06",
            'tgl_rusak' => "2023-10-06",
            'id_ptk' => 17,
            'koor_x' => 90123,
            'koor_y' => 82321,
            'keterangan' => "nge ghosting",
            'diameter' => 89
        ]);
        
        rosak::create([
            'id_rusak' => 2,
            'jns_rusak' => 0,
            'tgl_input' => "2023-10-06",
            'tgl_rusak' => "2023-10-06",
            'id_ptk' => 3,
            'koor_x' => 90123,
            'koor_y' => 82321,
            'keterangan' => "pokokmen rosak",
            'diameter' => 50
        ]);
        
        rosak::create([
            'id_rusak' => 5,
            'jns_rusak' => 0,
            'tgl_input' => "2023-10-06",
            'tgl_rusak' => "2023-10-06",
            'id_ptk' => 2,
            'koor_x' => 90123,
            'koor_y' => 82321,
            'keterangan' => "dehidrasi",
            'diameter' => 5
        ]);
        
        rosak::create([
            'id_rusak' => 6,
            'jns_rusak' => 0,
            'tgl_input' => "2023-10-06",
            'tgl_rusak' => "2023-10-06",
            'id_ptk' => 15,
            'koor_x' => 90123,
            'koor_y' => 82321,
            'keterangan' => "anu",
            'diameter' => 12
        ]);

        LuasHutan::create([
            'luas_lindung' => "1000",
            'luas_produksi' => "800",
        ]);
    }
}