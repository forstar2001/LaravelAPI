<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        
        DB::table('categories')->insert([
            'category_name' => 'Flora',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Human',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Crystal',
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Star',
        ]);
    }
}
