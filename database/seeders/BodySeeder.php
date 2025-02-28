<?php

namespace Database\Seeders;

use Database\Factories\BodyFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Body;

class BodySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countBodies = count(BodyFactory::CAR_BODIES);
        Body::factory()->count($countBodies)->create();
    }
}
