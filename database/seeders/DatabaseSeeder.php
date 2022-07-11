<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\AuthorizationBasicAuth::create([
            'app' => 'Etape Zalando',
            'store_id' => null,
            'username' => 'zalando-etape',
            'password' => 'ueBIg7y!9T37wD7*soS*',
            'basic' => 'Basic ' .base64_encode('zalando-etape:ueBIg7y!9T37wD7*soS*'),
        ]);
    }
}
