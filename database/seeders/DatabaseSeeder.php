<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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

        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        $user2 = User::factory()->create([
            'name' => 'Doctor Philip Solomon'
        ]);

        $health = Category::factory()->create([
            'name' => 'health'
        ]);

        $post = Post::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        Post::factory(3)->create([
            'user_id' => $user2->id,
            'category_id' => $health->id

        ]);


        Comment::factory(3)->create([
            'post_id' => $post->id
        ]);

        //if you don't refresh db at the start
        //if you only run seeders when your run
        // User::truncate();
        // Post::truncate();
        // Category::truncate();

        // $user = User::factory()->create();

        // $health = Category::create([
        //     'name' => 'Health',
        //     'slug' => 'health'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // $nature = Category::create([
        //     'name' => 'Nature',
        //     'slug' => 'nature'
        // ]);

        // Post::create([
        //     'user_id' =>$user->id,
        //     'category_id' => $nature->id,
        //     'slug' => 'the-beauty-of-nature',
        //     'title' => 'The Beauty of Nature',
        //     'excerpt' => 'Immerse yourself in the awe-inspiring beauty of nature and discover the profound impact it can have on your well-being.',
        //     'body' => "<p>Nature has an incredible power to uplift and inspire us. Whether it's the sight of a majestic mountain range, the sound of waves crashing on the shore, or the tranquility of a serene forest, nature has a way of captivating our senses and filling us with a sense of wonder. Studies have shown that spending time in nature can have numerous benefits for our mental and physical health. It reduces stress, improves mood, and enhances overall well-being. Simply taking a walk in a park or spending time in a garden can have a calming effect and provide a much-needed escape from the hustle and bustle of daily life.</p><p>Furthermore, connecting with nature can foster a deeper sense of gratitude and environmental consciousness. When we witness the intricate ecosystems and the delicate balance of life in nature, we develop a greater appreciation for the world around us. It reminds us of our responsibility to protect and preserve the natural environment for future generations. From hiking in a national park to enjoying a picnic by the beach, there are countless ways to immerse yourself in the beauty of nature and reap its countless benefits.</p>"
        //     ]);
        // Post::create([
        //     'user_id' =>$user->id,
        //     'category_id' => $work->id,
        //     'slug' => '5-tips-for-boosting-your-productivity-at-work',
        //     'title' => '5 Tips for Boosting Your Productivity at Work',
        //     'excerpt' => 'Are you struggling to stay focused and productive during your workday? Here are five practical tips that can help you boost your productivity and accomplish more in less time.',
        //     'body' => "<p>In today's fast-paced work environment, staying productive can be a real challenge. However, with the right strategies, you can maximize your efficiency and achieve your professional goals. First, start your day by prioritizing tasks. Make a to-do list and identify the most important and urgent items that need your attention. Next, minimize distractions by creating a dedicated work area and turning off notifications on your phone or computer. Maintaining a clear and focused workspace will help you stay on track. Additionally, take regular breaks to recharge your energy levels and avoid burnout. Short breaks can improve your concentration and overall productivity. Moreover, consider leveraging technology to automate repetitive tasks or streamline your workflow. Tools like project management software or time-tracking apps can save you time and effort. Finally, don't forget to take care of yourself outside of work. Prioritize sleep, exercise, and healthy eating habits, as they contribute to your overall well-being and performance at work.</p>"
        //     ]);


    }
}
