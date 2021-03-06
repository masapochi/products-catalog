<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Item;
use App\Models\Category;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->truncate();

        $faker = Faker::create('en_US');

        $cats = Category::where('parent_id', '<>', 0)->get();

        foreach ($cats as $cat) {
            for ($i = 0; $i < rand(3, 9); $i++) {
                $name = trim($faker->unique()->sentence(1), '.');
                $slug = strtolower(str_replace(' ', '-', $name));
                Item::create([
                    'id'           => $faker->unique()->numberBetween(1000000000000, 9999999999999),
                    'cat_id'       => $cat->id,
                    'slug'         => $slug,
                    'name'         => $name,
                    'model'        => $faker->city,
                    'release_date' => (new DateTime())->format('Y-m-d'),
                    'color'        => $faker->colorName,
                    'desc'         => $faker->sentence(16),
                    'width'        => $faker->numberBetween(100, 1000),
                    'height'       => $faker->numberBetween(100, 1000),
                    'depth'        => $faker->numberBetween(100, 1000),
                    'weight'       => $faker->numberBetween(100, 1000),
                    'material'     => implode(', ', explode(' ', trim($faker->unique()->sentence(rand(1, 4)), '.'))),
                    'priority'     => $i,
                    'is_public'    => 1,
                ]);
            }
        }
    }
}
