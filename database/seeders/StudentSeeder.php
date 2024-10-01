<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->delete();
        $datas = [
            ['id' => 1, 'course_id'=>1,'firstName' => 'Алтангадас', 'lastName' => 'О', 'gender' => 'эрэгтэй', 'phoneNumber' => '999', 'RD' => 'ЩК07221117','isActive' => true],
            ['id' => 2, 'course_id'=>1,'firstName' => 'Анир', 'lastName' => 'Б', 'gender' => 'эмэгтэй', 'phoneNumber' => '8888', 'RD' => 'УЦ07816544','isActive' => true],
            ['id' => 3, 'course_id'=>1,'firstName' => 'Билгүүн', 'lastName' => 'С', 'gender' => 'эрэгтэй', 'phoneNumber' => '999', 'RD' => 'УЦ07576544','isActive' => true],
            ['id' => 4, 'course_id'=>1,'firstName' => 'Билгүүн', 'lastName' => 'Д', 'gender' => 'эрэгтэй', 'phoneNumber' => '8888', 'RD' => 'УЦ07076544','isActive' => true],
            ['id' => 5, 'course_id'=>1,'firstName' => 'Тэнүүн', 'lastName' => 'Б', 'gender' => 'эрэгтэй', 'phoneNumber' => '999', 'RD' => 'УЦ07846544','isActive' => true],
            ['id' => 6, 'course_id'=>1,'firstName' => 'Энхдөлгөөн', 'lastName' => 'Б', 'gender' => 'эрэгтэй', 'phoneNumber' => '8888', 'RD' => 'ХП07138423','isActive' => true],
            ['id' => 7, 'course_id'=>1,'firstName' => 'Энэрэл', 'lastName' => 'Э', 'gender' => 'эмэгтэй', 'phoneNumber' => '8888', 'RD' => 'ХП07328487','isActive' => true],
        ];
        DB::table('students')->insert($datas);
    }
}
