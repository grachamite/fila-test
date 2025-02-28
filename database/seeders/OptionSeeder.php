<?php

namespace Database\Seeders;

use Database\Factories\OptionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countBodies = count(OptionFactory::CAR_OPTIONS);
        Option::factory()->count(rand($countBodies / 3 * 2, $countBodies))->create();
    }
}
