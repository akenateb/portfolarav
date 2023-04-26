<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


         \App\Models\User::factory()->create([
             'name' => 'akenateb',
             'email' => 'dont@spamme.com',
         ]);
        \App\Models\User::factory()->create([
            'name' => 'Test',
            'email' => 'test@spamme.com',
        ]);

        $this->call(CategorySeeder::class);

        Article::factory(20)->create();
    }
}
