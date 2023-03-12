<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Faker\Factory as Faker;

class PostController extends Controller
{   

    public function index()
    {
        $posts = Post::with('user')->paginate(10);
        return view('posts')->with(['posts'=> $posts]);
    }

    public function show($slug){
        $post = Post::with('user')->where('slug', $slug)->first();
        return view('post_single', compact('post'));
    }
    
    public function getPosts(){
        $userid = '640d565ca925ca068b0dee5e';
        $posts = Post::with('user')->first();
        $user = User::with('posts')->find(new ObjectId($userid));
       // echo $posts->user->name;
       //echo "<pre>";
      //  print_r($user);
        //die;
        $id = '640d565ca925ca068b0dee5a';
        $categoriesWithPosts = Category::with(['posts'])->get();
        echo "<pre>";
        print_r($categoriesWithPosts);
    }

    public function checkPivotRecords(){
        $catId = '640d649e258533d52e016dea';
        $category = Category::findOrFail(new ObjectId($catId));
        
        //$post1 = $this->createPost();
        //$category->posts()->attach($post1);
        
        $categoryData = Category::with('posts')->find($category->_id);
        echo "<pre>";

        print_r($categoryData);

        // $id = '640d5f25df56cfe79c0fb10a';
        // $category = Category::find(new ObjectId($id));
        // print_r($category);
        // $posts = $category->posts;

        // print_r($posts);

        // foreach ($posts as $post) {
        //     echo "Post ID: " . $post->id . "<br>";
        //     echo "Pivot Created At: " . $post->pivot->created_at . "<br>";
        //     echo "Pivot Updated At: " . $post->pivot->updated_at . "<br>";
        // }

    }


    private function createPost(){
        
        $faker = Faker::create();
        
        $post = new Post;
        $post->title = $faker->sentence;
        $post->content = $faker->paragraph;
        $post->slug = $faker->slug;
        $post->image = $faker->imageUrl;
        $post->user_id = User::all()->random()->id;
        $post->save();

        return $post;
    }

    public function getPostWithCategories(){
        $postId = '640d6e2ace715c60e80b8f45';
        $post = Post::findOrFail(new ObjectId($postId));
        
        //$post1 = $this->createPost();
        //$category->posts()->attach($post1);
        
        $postWithCategories = Post::with('categories')->find($post->_id);
        echo "<pre>";

        print_r($postWithCategories);
    }

    public function getPostsByUser(){
        $userId = '640d649e258533d52e016def';
        $user = User::with('posts')->findOrFail(new ObjectId($userId));
        echo "<pre>";
        print_r($user->posts);
    }
   
}
