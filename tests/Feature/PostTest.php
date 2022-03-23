<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    /**
     * Endpoint to get all posts exists.
     *
     * @return void
     */
    public function test_get_all_posts()
    {
        $response = $this->get('/api/posts');

        $response->assertStatus(200);
    }

    /**
     * Endpoint to get one post exists.
     *
     * @return void
     */
    public function test_get_one_post()
    {
        $response = $this->get('/api/posts/1');

        $response->assertStatus(200);
    }

    /**
     * Endpoint to create one post.
     * 
     * Only authenticated posts can create posts
     *
     * @return void
     */
    public function test_create_one_post()
    {

        $data = [
            'title' => 'Test post',
            'user_id' => 1
        ];

        $response = $this->post('api/posts', $data);

        $post = Post::where('title', $data['title'])
                        ->where('user_id', $data['user_id'])
                        ->latest('id')
                        ->first();

        

        $response->assertStatus(200);
    }

    /**
     * Endpoint to delete one post.
     *
     * @return void
     */
    public function test_delete_one_post()
    {
        $post = Post::create(
            [
                'title' => 'Test post',
                'user_id' => 1
            ]
        );

        $response = $this->delete('api/posts/' . $post->id);

        $response->assertStatus(200);
    }
}
