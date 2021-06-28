<?php

namespace Database\Seeders;

use App\Models\Cooperation;
use Illuminate\Database\Seeder;

class CooperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Cooperation::factory()->create();
    }
}
