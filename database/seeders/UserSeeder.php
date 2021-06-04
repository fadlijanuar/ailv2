<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'nip' => '123',
            'unit_id' => 0,
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);
        User::factory()->count(5)->create();
    }
}
