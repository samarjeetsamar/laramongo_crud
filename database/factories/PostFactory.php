<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Post;
use DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    
    public function definition()
    {
        //$category_id = Category::inRandomOrder()->first()->_id;
        $category_id = DB::collection('categories')->inRandomOrder()->first()->_id;
        echo $category_id;
        die;
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(3, true),
            'image' => $this->faker->imageURL(),
            'user_id' => User::factory(),
            'category_id' => $category_id,
        ];
    }
}
