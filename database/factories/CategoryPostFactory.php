<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryPost>
 */
class CategoryPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryIds = DB::collection('categories')->pluck('_id');
        $postIds = DB::collection('posts')->pluck('_id');

        return [
            'category_id' => $categoryIds->random(),
            'post_id' => $postIds->random(),
        ];
    }
}
