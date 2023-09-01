<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public function testLikePost()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->post("/like/{$post->id}");

        $response->assertRedirect();
        $this->assertDatabaseHas('likes', [
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);
    }

    public function testUnlikePost()
    {
        $user = User::factory()->create();
        Auth::login($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $like = Like::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);

        $this->actingAs($user);

        $response = $this->post("/unlike/{$post->id}");

        $this->assertDatabaseMissing('likes', [
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);

        $response->assertRedirect();
    }

    public function testLikeComment()
    {
        $user = User::factory()->create();

        Auth::login($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $comment = Comment::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => $this->faker->paragraph,
        ]);

        $response = $this->post(route('like.comment', ['post' => $comment->id]));
        $this->assertDatabaseHas('likes', [
            'user_id' => $user->id,
            'comment_id' => $comment->id,
        ]);
    }

    public function testUnlikeComment()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $comment = Comment::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => $this->faker->paragraph,
        ]);

        $like = Like::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);

        $response = $this->post(route('unlike.comment', ['post' => $comment->id]));

        $response->assertRedirect();
        $this->assertDatabaseMissing('likes', [
            'user_id' => $user->id,
            'comment_id' => $comment->id,
        ]);
    }
}
