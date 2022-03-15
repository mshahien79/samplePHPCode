<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PoultryBorsa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::Table('poultry_kinds')->insert([
            'poultry_kind_name'=>'Turkey',
            'poultry_kind_name_ar'=>'ديك رومي',
            'description'=>'',
            'created_at'=>date('y-m-d H:i:s'),
            'updated_at'=>date('y-m-d H:i:s'),
        ]);
        DB::Table('poultry_kinds')->insert([
            'poultry_kind_name'=>'Chickens',
            'poultry_kind_name_ar'=>'دجاج',
            'description'=>'',
            'created_at'=>date('y-m-d H:i:s'),
            'updated_at'=>date('y-m-d H:i:s'),
        ]);
        DB::Table('poultry_kinds')->insert([
            'poultry_kind_name'=>'Goose',
            'poultry_kind_name_ar'=>'أوز',
            'description'=>'',
            'created_at'=>date('y-m-d H:i:s'),
            'updated_at'=>date('y-m-d H:i:s'),
        ]);
        DB::Table('poultry_kinds')->insert([
            'poultry_kind_name'=>'Duck',
            'poultry_kind_name_ar'=>'بط',
            'description'=>'',
            'created_at'=>date('y-m-d H:i:s'),
            'updated_at'=>date('y-m-d H:i:s'),
        ]);
        DB::Table('poultry_breeds')->insert([
            'breed_name'=>'White',
            'breed_name_ar'=>'تركي أبيض',
            'description'=>'',
            'created_at'=>date('y-m-d H:i:s'),
            'updated_at'=>date('y-m-d H:i:s'),
        ]);
    }
}
