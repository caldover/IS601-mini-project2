<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class UnitTest extends TestCase
{

    public function testInsertUser()
    {
        // Get the initial count of users in the users table
        $initialUsers = DB::table('users')->get()->toArray();
        $initialCount = count($initialUsers);

        // Create and insert new user
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@email.com',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ]);

        // Get the new count of users in the users table
        $newUsers = DB::table('users')->get()->toArray();
        $newCount = count($newUsers);

        // Check if initial count of users + 1 is equal to the new count
        $this->assertSame($initialCount + 1, $newCount);

        // Remove the user from the users table
        DB::table('users')->where('email', 'test@email.com')->delete();
    }
}
