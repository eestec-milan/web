<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Meeting;
use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::truncate();

        $members = Member::all();
        $meetings = Meeting::all();

        // Create a few attendances in our database:
        for ($i = 0; $i < 50; $i++) {
            Attendance::create([
                'memberId' => $members->random()->id,
                'meetingId' => $meetings->random()->id,
            ]);
        }
    }
}
