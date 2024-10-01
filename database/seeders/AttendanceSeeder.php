<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendances')->delete();
        $datas = [
            ['id' => 1, 'course_id' => 1,'student_id' => 1, 'stat_id' => 1, 'adate' => now(), 'created_at' => now(),'updated_at'=>now()],
            ['id' => 2, 'course_id' => 2,'student_id' => 2, 'stat_id' => 2, 'adate' => now(), 'created_at' => now(),'updated_at'=>now()],
            ['id' => 3, 'course_id' => 3,'student_id' => 3, 'stat_id' => 3, 'adate' => now(), 'created_at' => now(),'updated_at'=>now()],
            ['id' => 4, 'course_id' => 4,'student_id' => 4, 'stat_id' => 4, 'adate' => now(), 'created_at' => now(),'updated_at'=>now()],
            ['id' => 5, 'course_id' => 5,'student_id' => 5, 'stat_id' => 1, 'adate' => now(), 'created_at' => now(),'updated_at'=>now()],
            ['id' => 6, 'course_id' => 6,'student_id' => 6, 'stat_id' => 3, 'adate' => now(), 'created_at' => now(),'updated_at'=>now()],
            ['id' => 7, 'course_id' => 7,'student_id' => 7, 'stat_id' => 2, 'adate' => now(), 'created_at' => now(),'updated_at'=>now()],
        ];
        DB::table('attendances')->insert($datas);
    }
}
