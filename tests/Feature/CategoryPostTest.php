<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
class CategoryPostTest extends TestCase
{
    

    public function testPivotTableRelationship()
    {
        // Create a category
        $category = Category::create([
            'name' => 'Test Category',
        ]);

        // Create two posts
        $post1 = Post::create([
            'title' => 'Test Post 1',
            'content' => 'This is a test post.',
            'slug' => Str::slug('Test Post 1'),
        ]);

        $post2 = Post::create([
            'title' => 'Test Post 2',
            'content' => 'This is another test post.',
            'slug' => Str::slug('Test Post 2'),
        ]);

        // Attach the posts to the category using the pivot table
        $category->posts()->attach($post1);
        $category->posts()->attach($post2);

        // Retrieve the category and its posts
        $category = Category::with('posts')->find($category->_id);

        // Assert that the posts are attached to the category
        $this->assertEquals(2, $category->posts->count());
        $this->assertTrue($category->posts->contains($post1));
        $this->assertTrue($category->posts->contains($post2));
    }
}