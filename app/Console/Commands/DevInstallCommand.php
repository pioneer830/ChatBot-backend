<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DevInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install command';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Copy the .env.example file to .env
        if (!file_exists('.env')) {
            copy('.env.example', '.env');
            $this->info('.env file created');
        }

        // Install composer dependencies
        $this->info('Installing composer dependencies...');
        exec('composer install');
        $this->info('Composer dependencies installed successfully.');


        // Run migrations and seed the database
        $this->info('Running migrations and seeders...');
        $this->call('migrate:fresh', ['--seed' => true]);
        $this->info('Migrations and seeders completed.');

        // Generate an application key
        $this->info('Generating application key...');
        $this->call('key:generate');
        $this->info('Application key generated.');


        // Install npm dependencies
        $this->info('Installing npm dependencies...');
        exec('npm install');
        $this->info('npm dependencies installed successfully.');


        // Install npm build command
        $this->info('Installing npm dependencies...');
        exec('npm run build');
        $this->info('npm dependencies installed successfully.');
    }
}
