<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->insert([
            [
                'phone' => '0812-2866-6363',
                'address' => 'Banjaran 1, Karanganyar, Kec. Borobudur, Kab. Magelang',
                'email' => 'kampunghomestayborobudur@gmail.com',
                'facebook' => 'https://www.facebook.com/profile.php?id=100064204562857&locale=es_LA&paipv=0&eav=AfYwKKkQecY0yNusWWxJ-ADg3XFqwEb90DY-I-eXIRU9jht9roAk3OtxUzGaXJ-WFwg',
                'instagram' => 'https://www.instagram.com/homestay_borobudur/',
                'youtube' => 'https://www.youtube.com/watch?v=x7tIqV1OnyE',
                'copyright' => 'KampungHomestayBorobudur',
            ],
        ]);
    }
}
