<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(1),
            'post_content' =>fake()->text(20),
            'image' => fake()->imageUrl(200, 150, 'cats'),
            'likes' => random_int(1, 100),
            'is_published' => 1,
            'category_id' => Category::get()->random()->id
        ];
    }
}
