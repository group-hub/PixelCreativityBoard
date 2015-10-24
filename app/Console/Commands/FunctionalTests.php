<?php

namespace PixelCreativityBoard\Console\Commands;

use Illuminate\Console\Command;

class FunctionalTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'functional-tests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the codeception functional tests.';

    /**
     * Create a new command instance.
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
        putenv('DB_CONNECTION=sqlite');
        putenv('APP_ENV=testing');
        $database = storage_path().'/database.sqlite';
        system("touch $database");
        system('php artisan migrate:install');
        system('php artisan migrate:refresh --seed --force');
        passthru('vendor/bin/codecept run functional');
        system("rm $database");
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['file', InputArgument::OPTIONAL, 'Test a specific file'],
        ];
    }
}
