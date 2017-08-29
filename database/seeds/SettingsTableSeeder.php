<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Setting::create([
            'site_name' => 'Blog Maroto',
            'contact_number' => '035988461456',
            'contact_email' => 'gusouza980@gmail.com',
            'address' => 'Rua Olimpia Pires de Souza, 190 - Centro - Serrania'
        ]);
    }
}
