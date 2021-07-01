<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Portfolio::factory()->count(5)->create();
    }
}
