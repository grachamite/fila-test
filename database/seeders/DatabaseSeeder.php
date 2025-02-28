<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class DatabaseSeeder extends Seeder
{
    private ConsoleOutput $consoleOutput;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->consoleOutput = new ConsoleOutput();

        $this->consoleOutput->writeln('Сидируем базу данных');

        $this->call([
            CountrySeeder::class,
            BrandSeeder::class,
            ColorSeeder::class,
            CitySeeder::class,
            ShopSeeder::class,
            BodySeeder::class,
            OptionSeeder::class,
            CarSeeder::class
        ]);
    }
}
