<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            [
                'event_id' => 1,
                'unique_code' => 'TICKET1234',
                'user_id' => 1,
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => 2,
                'user_id' => 2,
                'price' => 150.00,
                'unique_code' => 'TICKET5678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data tickets lainnya sesuai kebutuhan proyek Anda
        ]);
    }
}