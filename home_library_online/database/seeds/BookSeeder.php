<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('books')->insert([
            'title' => Str::random(10),
            'author_name' => Str::random(10),
            'category' => Str::random(6),
            'publisher' => Str::random(6),
            'status' => 'Available'
        ]);

    }
}
