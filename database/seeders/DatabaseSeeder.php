<?php

namespace Database\Seeders;

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

        $this->call(CountriesTableSeeder::class);
        $this->command->info('Countries table seeded!');

        $this->call(CitiesTableSeeder::class);
        $this->command->info('Cities table seeded!');

        $this->call(UsersTableSeeder::class);
        $this->command->info('User table seeded!');

        $this->call(ApartmentsTableSeeder::class);
        $this->command->info('Apartments table seeded!');

        $this->call(FriendsTableSeeder::class);
        $this->command->info('Friends table seeded!');

        $this->call(PostsTableSeeder::class);
        $this->command->info('Posts table seeded!');

        $this->call(TagsTableSeeder::class);
        $this->command->info('Tags table seeded!');
    }
}
