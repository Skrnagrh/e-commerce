<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '08983893848',
            'address' => 'Serang',
            'password' => bcrypt('admin123')
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'phone' => '0898657674291',
            'address' => 'Banten',
            'password' => bcrypt('user123')
        ]);
        User::create([
            'name' => 'User Satu',
            'email' => 'usersatu@gmail.com',
            'phone' => '0898657674291',
            'address' => 'Banten',
            'password' => bcrypt('user123')
        ]);
    }
}
