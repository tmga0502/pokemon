<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->truncate();

      User::insert([
        'name' => 'mu',
        'email' => 'mu@gmail.com',
        'password' => Hash::make('a12345'),
        'created_at' => new DateTime('now'),
        'updated_at' => new DateTime('now'),
      ]);
    }
}
