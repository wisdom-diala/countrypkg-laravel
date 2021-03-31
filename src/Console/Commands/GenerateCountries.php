<?php

namespace Wisdom\Countrypkg\Console\Commands;

// use App\Customs\GenerateMethod;
use Illuminate\Console\Command;

class GenerateCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to generate all countries around the world and store in the database';

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
     * @return int
     */
    public function handle()
    {
        // GenerateMethod::generateCountries();
        $this->info("All countries generated and saved successfully");
        // $this->info($this->argument('country'));

    }
}
