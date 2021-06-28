<?php

namespace Database\Seeders;

use App\Models\CompanyDetail;
use Illuminate\Database\Seeder;

class CompanyDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        CompanyDetail::factory()->create();
    }
}
