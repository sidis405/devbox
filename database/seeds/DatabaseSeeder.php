<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 30 tag
        $tags = factory(Tag::class, 30)->create();

        // 10 categorie
        $categories = factory(Category::class, 10)->create();

        // 10 utenti
        User::create([
            'name' => 'Sid',
            'email' => 'forge405@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);

        factory(User::class, 9)->create();

        $users = User::all();

        foreach ($users as $user) {
            // 15 post per utente
            $posts = factory(Post::class, 15)->create([
                'user_id' => $user->id,
                // 1 categoria random per post
                'category_id' => $categories->random()->id
            ]);

            // 3 tag random per post
            // iterare posts
            foreach ($posts as $post) {
                // isolare 3 tags id random
                $randomTags = $tags->random(3)->pluck('id')->toArray();
                // associare post a tags
                $post->tags()->sync($randomTags);
            }
        }
    }
}
