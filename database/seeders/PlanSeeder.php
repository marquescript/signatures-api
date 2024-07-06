<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;


class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::factory(5)->create();
    }
}
