<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'factory:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the migrations in the order specified in the file app/Console/Comands/MigrateInOrder.php \n Drop all the table in db before execute the command.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('db:wipe', [
            '--force' => true
        ]);
        
        $migrations = [
            '2023_01_14_041430_create_directors_table.php',
            '2023_01_14_050716_create_countries_table.php',
            '2023_01_14_050751_create_regions_table.php',
            '2023_01_14_050760_create_cities_table.php',
            '2014_10_12_000000_create_users_table.php'
        ];

        foreach ($migrations as $migration) {
            $basePath = 'database/migrations/';
            $migrationName = trim($migration);
            $path = $basePath . $migrationName;

            $this->call('migrate', [
                '--path' => $path,
            ]);
        }

        $this->call('db:seed', [
            '--class' => 'CountrySeeder',
        ]);

        $this->call('db:seed', [
            '--class' => 'RegionSeeder',
        ]);

        $this->call('db:seed', [
            '--class' => 'CitySeeder',
        ]);
        
        $this->call('migrate');

        $this->call('db:seed', [
            '--class' => 'DatabaseSeeder',
        ]);
        
    }
}
