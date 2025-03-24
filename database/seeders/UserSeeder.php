<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = ['employee', 'employer'];

        for ($i = 1; $i <= 20; $i++) {
            $user = User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'status' => fake()->randomElement(['active', 'inactive']),
                'password' => Hash::make('password'), // Default password
                'avatar' => self::assignRandomAvatar(),
                'email_verified_at'=>Carbon::now()
            ]);

            // Assign a random role
            $randomRole = fake()->randomElement($roles);
            $user->assignRole($randomRole);
        }
    }

    private static function assignRandomAvatar()
    {
        return "avatars/Asset " . rand(1, 47) . ".png";
    }

}
