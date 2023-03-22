<?php

namespace Database\Seeders;

use App\Models\Meeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class MeetingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Meeting::truncate();

        $faker = \Faker\Factory::create();

        // Create a few meetings in our database:
        for ($i = 0; $i < 50; $i++) {
            Meeting::create([
                'location' => $faker->city,
                'date' => $faker->dateTimeThisMonth,
                'title' => $faker->sentence,
            ]);
        }
    }
}
