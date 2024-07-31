<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(HomePageSeeder::class);
        $this->call(PolicyPageSeeder::class);
        $this->call(TermsPageSeeder::class);
        $this->call(RentalAgreementPageSeeder::class);
        $this->call(InsuranceContractPageSeeder::class);
       $this->call(PagesSeeder::class);

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
