<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        // Buat 25 artikel dummy
        for ($i = 0; $i < 25; $i++) {
            // Generate kalimat dengan panjang 6 kata
            $title = $faker->sentence(6);
            // Generate link untuk url gambar
            $image = $faker->imageUrl(800, 400, 'cats', true, 'Faker');
            // Generate paragraf dengan panjang 20 kalimat
            $body = $faker->paragraph(20);
            // Generate angka acak antara 0 hingga 100
            $views = $faker->numberBetween(0, 100);
            // Generate DateTime antara 3 bulan lall
            $created_at = $faker->dateTimeBetween('-3 months', 'now');

            DB::table('menus')->insert([
                'nama' => $nama,
                'rekomendasi' => $rekomendasi,
                'harga' => $harga,
                'views' => $views,
                'published_at' => $created_at,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
    }
}
}
