<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Foto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'username' => 'Anonymous',
            'nama_lengkap' => 'Anonymous'
        ]);

        User::factory(10)->create();
        Foto::factory(10)->create();
    }
}
