<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Generator\NameGeneratorFactory;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['FRONT-END', 'BACK-END', 'FULL-DEVELOPER'];

        foreach ($types as $type_name) {

            $new_type = new Type();

            $new_type->name = $type_name;
            $new_type->slug = Str::slug($type_name);
            $new_type->created_by = '';

            $new_type->save();
        }


    }
}
