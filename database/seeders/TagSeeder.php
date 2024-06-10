<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['PHP', 'LARAVEL', 'HTML', 'VUE', 'JS','CSS'];
        

        foreach ($tags as $tag_name) {

            $new_tag = new Tag();

            $new_tag->name = $tag_name;
            $new_tag->slug = Str::slug($tag_name);

            $new_tag->save();
        }


    }
}
