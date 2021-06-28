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
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CompanyDetailSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(ProcessSeeder::class);
        $this->call(EquipmentSeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(AdvantageSeeder::class);
        $this->call(CooperationSeeder::class);
    }
}
