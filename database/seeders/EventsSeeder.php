<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'name' => 'Football Match',
                'description' => 'Watch a thrilling football match with your friends.',
                'date' => now()->addDays(10),
                'location' => 'Stadium ABC',
                'photo' => 'images/bg1.png',
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Concert A',
                'description' => 'Enjoy a live concert of your favorite band.',
                'date' => now()->addDays(5),
                'location' => 'Arena XYZ',
                'photo' => 'images/bg2.png',
                'price' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data events lainnya sesuai kebutuhan proyek Anda
        ]);
    }
}