<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Report::factory(10)->create();
        \App\Models\Comment::factory(10)->create();
        \App\Models\Image::factory(10)->create();

       $images = \App\Models\Image::all();

        \App\Models\Report::all()->each(function($report) use ($images){
            $report->images()->attach(
                $images->random(rand(1,3))->pluck('id')->toArray());
        });

    }
}
