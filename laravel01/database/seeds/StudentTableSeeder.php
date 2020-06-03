<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('students')->insert([
            ['name'=>'lifang','age'=>29],
            ['name'=>'lifang5','age'=>30],
            ['name'=>'lifang6','age'=>27],
            ['name'=>'lifang7','age'=>28],
            ['name'=>'lifang8','age'=>31]
        ]);
    }
}
