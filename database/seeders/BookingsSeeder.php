<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            [
                'event_id' => 1,
                'user_id' => 1,
                'ticket_id' => 1,
                'quantity' => 2,
                'price' => 200.00,
                'status' => 'paid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => 2,
                'user_id' => 2,
                'ticket_id' => 2,
                'quantity' => 1,
                'price' => 150.00,
                'status' => 'unpaid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data bookings lainnya sesuai kebutuhan proyek Anda
        ]);
    }
}