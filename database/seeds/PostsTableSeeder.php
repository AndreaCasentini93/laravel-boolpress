<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            $newPost = new Post();

            $newPost->title = 'Titolo Articolo ' . $i;
            $newPost->slug = Str::slug($newPost->title);
            $newPost->content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi porro beatae dolore dolor dolorum natus, laudantium consequatur, suscipit doloribus asperiores quo minus numquam aliquam perspiciatis sunt mollitia, temporibus quaerat ullam molestias fugiat hic itaque! Impedit assumenda eius velit quidem consequuntur hic suscipit atque blanditiis, expedita dicta culpa consectetur quasi unde.';

            $newPost->save();
        }
    }
}
