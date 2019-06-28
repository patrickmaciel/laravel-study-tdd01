<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class PostResourceIndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * view all posts
     * @group posts
     *
     * @return void
     */
    public function testRenderAllPosts()
    {
        $post1 = factory(Post::class)->create();
        $post2 = factory(Post::class)->create();

        $resp = $this->get('/posts');
        $resp->assertStatus(200);
        $resp->assertSee($post1->title);
        $resp->assertSee($post2->title);
        $resp->assertSee(str_limit($post1->body));
        $resp->assertSee(str_limit($post2->body));
    }
}
