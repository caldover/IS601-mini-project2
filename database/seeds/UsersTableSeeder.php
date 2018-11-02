<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    // IMPORTANT - use command: php artisan migrate:refresh --seed
    // This will avoid the unique email violation when seeding
    public function run()
    {
        // Creates a total of 50 users:
        // 1 defined admin user for FeatureTest purposes
        // 49 randomly generated users

        // Create defined admin user
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ]);

        // Create 49 random users
        factory(App\User::class, 49)->create();
    }
}
