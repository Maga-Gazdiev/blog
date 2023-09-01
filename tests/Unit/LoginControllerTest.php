<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndex()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('login.index');
    }

    public function testStoreValidCredentials()
    {
        // Создаем пользователя для входа
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $data = [
            'email' => 'test@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/login', $data);

        $this->assertTrue(Auth::check());
        $response->assertRedirect('/');
    }

    public function testStoreInvalidCredentials()
    {
        $data = [
            'email' => 'invalid@example.com',
            'password' => 'invalidpassword',
        ];

        $response = $this->post('/login', $data);

        // Проверяем, что пользователь не авторизован
        $this->assertFalse(Auth::check());

        // Проверяем, что произошло перенаправление обратно с ошибкой
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['email' => trans('auth.failed')]);
    }

    public function testLogout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/logout');
        $this->assertFalse(Auth::check());
        $response->assertRedirect(route('posts'));
        $this->assertNull(session('new_session_key'));
    }
}
