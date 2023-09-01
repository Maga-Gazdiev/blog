<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterControllerTest extends TestCase
{
    use DatabaseTransactions;
    public function testIndex()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('register.index');
    }
    public function testStoreValidData()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'sdfasfasfafefevccc@gmail.com',
            'password' => 'password123',
        ];

        $response = $this->post('/register', $data);

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'sdfasfasfafefevccc@gmail.com',
        ]);

        $this->assertTrue(Auth::check());
        $response->assertRedirect(route('posts'));
    }

    public function testStoreExistingEmail()
    {
        User::factory()->create(['email' => 'gdfgdggregeg@gmail.com']);

        $data = [
            'name' => 'Another User',
            'email' => 'gdfgdggregeg@gmail.com',
            'password' => 'password123',
        ];

        $response = $this->post('/register', $data);

        $this->assertFalse(Auth::check());

        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['email' => 'Такая почта уже существует в базе данных']);
    }
}
