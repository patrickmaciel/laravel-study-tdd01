<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class PostResourceCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * create post
     * @group posts
     *
     * @return void
     */
    public function testCreateAPost()
    {
        $dataPost = [
            'title' => 'New post',
            'body' => 'New post body'
        ];

        $res = $this->post('/posts', $dataPost);

        $this->assertDatabaseHas('posts', $dataPost);;
        $res->assertStatus(302);

        $post = Post::find(1);
        $this->assertEquals('New post', $post->title);
        $this->assertEquals('New post body', $post->body);
    }

    /**
     * validate title
     * @group posts
     *
     * @return void
     */
    public function testValidations()
    {
        $res = $this->post('/posts', ['body' => 'New post body']);
        $res->assertSessionHasErrors('title');

        $res = $this->post('/posts', ['title' => 'Title']);
        $res->assertSessionHasErrors('body');
    }
}
