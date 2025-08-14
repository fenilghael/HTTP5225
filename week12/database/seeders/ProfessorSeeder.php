<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Professor;

class ProfessorSeeder extends Seeder
{
    /**
     * Execute the database seeders to populate data.
     */
    public function run(): void
    {
        Professor::factory(10)->create();
    }
}
