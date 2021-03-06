<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {
            $newPost = new Post();

            $newPost->title = $faker->unique()->sentence(3);
            $newPost->slug = Str::slug($newPost->title);
            $newPost->content = $faker->text(600);

            $newPost->save();
        }
    }
}
