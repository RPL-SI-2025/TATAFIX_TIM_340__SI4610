<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register_with_valid_data()
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 123',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(); // arahkan ke halaman sesuai hasil registrasi, bisa ditambah ->assertRedirect('/home') jika sudah pasti

        $this->assertDatabaseHas('users', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 123',
        ]);

        $this->assertAuthenticated(); // pastikan user langsung login setelah register
    }

    /** @test */
    public function registration_fails_with_missing_fields()
    {
        $response = $this->post(route('register.store'), []); // kirim kosong

        $response->assertSessionHasErrors(['name', 'email', 'phone', 'address', 'password']);
    }

    /** @test */
    public function registration_fails_when_passwords_do_not_match()
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Sari',
            'email' => 'sari@example.com',
            'phone' => '081234567890',
            'address' => 'Jl. Kenanga No. 4',
            'password' => 'password123',
            'password_confirmation' => 'bedaPassword',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
