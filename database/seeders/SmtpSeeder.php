<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('smtp_settings')->insert([
            [
                'mailer' => 'smtp',
                'host' => 'sandbox.smtp.mailtrap.io',
                'port' => '2525',
                'username' => '9d3ad3f9632dda',
                'password' => '4822119f1fba04',
                'encryption' => 'tls',
                'from_address' => 'kampunghomestay@gmail.com',
            ],
        ]);
    }
}
