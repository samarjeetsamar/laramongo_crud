<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('posts', function (Blueprint $collection) {
            $collection->id();
            $collection->string('title');
            $collection->string('slug')->unique();
            $collection->text('content');
            $collection->string('image');
            $collection->foreignId('user_id')->constrained('users');
            $collection->foreignId('category_id')->constrained('categories');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('posts');
    }
};
