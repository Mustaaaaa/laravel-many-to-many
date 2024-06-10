<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types_ids = Type::all()->pluck('id')->all();
        $technology_ids = Technology::all()->pluck('id')->all();
        
        for ($i = 0; $i < 20; $i++) {

            $project = new Project();
            $title = $faker->sentence(rand(2, 6));

            $project->title = $title;
            $project->slug = Str::slug($title);
            $project->description = $faker->paragraph();
            $project->date_of_creation = $faker->date();
            $project->link = $faker->url();
            $project->created_by = $faker->name();
            $project->type_id = $faker->optional()->randomElement($types_ids);

            $project->save();

            $random_technology_ids = $faker->randomElements($technology_ids, null);

            $project->technologies()->attach($random_technology_ids);
        }
    }
}
