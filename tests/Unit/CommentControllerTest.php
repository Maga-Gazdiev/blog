<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comment;
use App\Models\User;

class CommentControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public function testStoreComment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $data = [
            'post_id' => $post->id,
            'user_id' => $user->id,
            'body' => $this->faker->sentence,
        ];

        $response = $this->actingAs($user)->post('/comments', $data);

        $response->assertRedirect(route('posts.show', $post->id));
        $this->assertDatabaseHas('comments', $data);
    }

    public function testEditComment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $comment = Comment::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => $this->faker->paragraph,
        ]);

        $response = $this->actingAs($user)->get("/comments/{$comment->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('comment.edit');
    }

    public function testUpdateComment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $comment = Comment::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => $this->faker->paragraph,
        ]);

        $data = [
            'post_id' => $comment->post_id,
            'body' => $this->faker->sentence,
        ];

        $response = $this->actingAs($user)->put("/comments/{$comment->id}", $data);

        $response->assertRedirect(route('posts.show', $comment->post_id));
        $this->assertDatabaseHas('comments', $data);
    }

    public function testDeleteComment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $comment = Comment::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => $this->faker->paragraph,
        ]);
        
        $response = $this->actingAs($user)->delete("/comments/{$comment->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    }
}