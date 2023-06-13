<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // \App\Models\User::factory(10)->create();
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'uuid' => Str::uuid(),
                'name' => $faker->name(),
                'gender' => "male",
                'profile' => "profiles/2fMcpEJI6Ybd4DcKZinpOnngxEDmUnGHfzQnJJdY.png",
                // 'thumbnail' => "profiles/jxAjtc7uY9PLx26EytgGTA0dtgqqJKbI8TqF8zbe.png",
                'email' => $faker->SafeEmail(),
                "email_verified_at" => now(),
                'password' => Hash::make("password"),
            ]);
        }

        for ($i = 0; $i < 100; $i++) {
            Group::create([
                "uuid" => Str::uuid(),
                "user_id" => User::InRandomOrder()->first()->id,
                "icon" => "groups/6Byv86zmAQ0p4rk8rZcImPD3GqPHDWtQldLwjUat.jpg",
                "thumbnail" => "groups/EJx2R6bIGp2eRWzUoZafrTW3xAgdknF78rKB8pHt.png",
                "description" => $faker->sentence(rand(10, 50)),
                "name" => $faker->name(),
                "location" => $faker->sentence(3),
                "type" => $faker->sentence(3),
                "members" => rand(200, 10000),
            ]);
        }
    }

}
