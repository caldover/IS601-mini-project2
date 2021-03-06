<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testAboutPage()
    {
        // Login with defined admin user from UsersTableSeeder
        // If you don't log in then we will get 302 status instead due to redirect back to login page
        $user = User::find(1);
        $this->ActingAs($user);

        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function testContactPage()
    {
        // Login with defined admin user from UsersTableSeeder
        // If you don't log in then we will get 302 status instead due to redirect back to login page
        $user = User::find(1);
        $this->ActingAs($user);

        $response = $this->get('/contact');
        $response->assertStatus(200);
    }
}