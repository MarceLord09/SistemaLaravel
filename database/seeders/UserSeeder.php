<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Miguel Cabanillas',
            'email' => 'miguelangel.392@gmail.com',
            'password'=>bcrypt('123456789')])->assignRole('Admin');
    
        User::factory()->create();
    }
}
