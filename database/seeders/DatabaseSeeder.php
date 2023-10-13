<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bdh;
use App\Models\Rph;
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
        
        // petak::create([
        //     'id_ptk' => 1,
        //     'nomor_ptk' => 1,
        //     'luas_ptk' => 321,
        //     'potensi_ptk' => 'Wisata Alam',
        //     'id_rph' => 1
        // ]);
        

        // dataUtama::create([
        //     'id_PU' => 1,
        //     'tanggal' => "2023-10-06",
        //     'id_ptk' => 10,
        //     'no_PU' => 7,
        //     'koor_x' => -93.098734,
        //     'koor_y' => 70.0542324,
        //     'tanam_sela' => "entah",
        //     'tahun_tanam' => 1990,
        //     'jarak_tanam' => 59,
        //     'umur_tgk' => 90,
        //     'keadaan_kes' => "Jelek",
        //     'kerataan_tgk' => "Agak rata",
        //     'kemurnian' => "Murni",
        //     'bentuk_lap' => "Punggung",
        //     'derajat_lereng' => 23,
        //     'landai_lereng' => "Landai",
        //     'kerataan_lap' => "Berombak",
        //     'jns_tanah' => "Latosol",
        //     'kedalaman' => 93,
        //     'dalaman' => "Dalam",
        //     'jns_bwh' => "entah",
        //     'kerapatan' => "Berbukit"
        // ]);

        // dataTegak::create([
        //     'id_tgk' => 1,
        //     'id_PU' => 1,
        //     'no_pohon' => 100,
        //     'jenis_tgk' => "Akasia",
        //     'diameter' => 17,
        //     'tinggi' => 90
        // ]);

        // rosak::create([
        //     'id_rusak' => 1,
        //     'jns_rusak' => 1,
        //     'tgl_input' => "2023-10-06",
        //     'tgl_rusak' => "2023-10-06",
        //     'id_PU' => 1,
        //     'koor_x' => 90123,
        //     'koor_y' => 82321,
        //     'diameter' => 89
        // ]);

        LuasHutan::create([
            'luas_lindung' => "1000",
            'luas_produksi' => "800",
        ]);
    }
}
