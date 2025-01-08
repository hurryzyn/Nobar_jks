<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class absenSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absens')->insert([
            [
                'ticket_id' => 1,
                'status' => 'not attended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ticket_id' => 2,
                'status' => 'attended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
