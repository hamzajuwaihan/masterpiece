<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\User_Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'instructor']);
        Role::factory()->create(['name' => 'user']);
        User::factory()->count(10)->create();
        User_Role::factory()->count(10)->create();
    }
}
