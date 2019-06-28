<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class BlogViewPost extends TestCase
{
    use RefreshDatabase;

    public function testCanViewABlogPost()
    {
        // arrangement
        // creating a blog post
        $post = Post::create([
            'title' => 'Título',
            'body' => 'Corpo',
        ]);
        // action
        // visiting a route
        $resp = $this->get("/posts/{$post->id}");
        // assert
        // assert status code 200
        $resp->assertStatus(200);
        // - that we see a post title
        $resp->assertSee($post->title);
        // - that we see post body
        $resp->assertSee($post->body);
        // - that we see post published date
        $resp->assertSee($post->created_at);
    }
}
