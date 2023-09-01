<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class OfficeControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public function testIndex()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('user.index'));
        $response->assertStatus(200);
        $response->assertViewIs('office.index');
        $response->assertViewHas('user', $user);
    }

    public function testPostsLike()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $likedPosts = Post::factory()->count(2)->create([
            'user_id' => $user->id,
        ]);

        $user->likedPosts()->attach($likedPosts);

        $response = $this->get(route('user.posts.like'));

        $response->assertStatus(200);
        $response->assertViewIs('office.posts');
    }

    public function testPosts()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $posts = Post::factory()->count(2)->create(['user_id' => $user->id]);

        $response = $this->get(route('user.posts'));

        $response->assertStatus(200);
        $response->assertViewIs('office.allPosts');
    }

    public function testComment()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $likedComments = Comment::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => $this->faker->paragraph,
        ]);
        $response = $this->get(route('user.comment'));

        $response->assertStatus(200);
        $response->assertViewIs('office.comment');
    }

    public function testLikedComment()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $likedComments = Comment::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => $this->faker->paragraph,
        ]);
        $user->likedComments()->attach($likedComments);

        $response = $this->get(route('user.likedComment'));

        $response->assertStatus(200);
        $response->assertViewIs('office.likedComment');
    }
}