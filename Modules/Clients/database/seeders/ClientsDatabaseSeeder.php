<?php

namespace Modules\Clients\Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(SeedMakeHistoryClientPostsSeeder::class);
    }
}
