<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public function testIndex()
    {
        $response = $this->get(route('posts'));

        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get(route('posts.edit', ['post' => $post->id]));

        $response->assertStatus(200);
        $response->assertViewHas('post');
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Test case 1: Valid input
        $validPostData = [
            'name' => $this->faker->name,
            'body' => $this->faker->text(600),
            'user_id' => $user->id,
        ];

        $response = $this->post(route('posts.store'), $validPostData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('posts', [
            'name' => $validPostData['name'],
            'body' =>  $validPostData['body'],
            'user_id' => $user->id,
        ]);

        $response->assertRedirect(route('posts'));
    }

    public function testShow()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get(route('posts.show', ['post' => $post->id]));

        $response->assertStatus(200);
        $response->assertViewHas('post');
    }

    public function testUpdate()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $faker = Faker::create();
        $data = [
            'name' => $faker->name,
            'body' =>  $faker->text,
            'user_id' => $user->id,
        ];

        $response = $this->put(route('posts.update', ['post' => $post->id]), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', $data);
    }

    public function testDestroy()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->delete(route('posts.destroy', ['post' => $post->id]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
