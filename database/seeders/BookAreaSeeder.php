<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_areas')->insert([
            [
                'short_title' => 'promo room nih',
                'main_title' => 'temukan homestay terbaik disini',
                'short_desc' => 'disini anda dapat menemukan sekaligus mencari homestay terbaik di sekitar candi borobudur',
            ],
        ]);
    }
}
