<?php

namespace WisdomDiala\Countrypkg\Console\Commands;

// use App\Customs\GenerateMethod;
use Illuminate\Console\Command;
use WisdomDiala\Countrypkg\Models\Country;

class GenerateCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'g:c';

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
        $response = file_get_contents(__DIR__.'/../../resources/files/countries.json');

        // GenerateMethod::generateCountries();
        $countries = json_decode($response);
        $no_of_countries = count($countries);
        if (Country::all()->count() <= 0) {
            for($i = 0; $i < $no_of_countries; $i++){
                Country::create([
                    'name' => $countries[$i]->name,
                    'short_name' => $countries[$i]->short_name,
                    'country_code' => $countries[$i]->country_code
                ]);
                $c = $countries[$i]->name;
                $this->info("Creating new records: $c... $i ");
            }
        }else{
            $count = Country::all()->count();
            $this->info("Records found.");
            $this->info("Deleting $count records...");
            $country = Country::truncate();
            $num = 0;
            for($i = 0; $i < $no_of_countries; $i++){
                Country::create([
                    'name' => $countries[$i]->name,
                    'short_name' => $countries[$i]->short_name,
                    'country_code' => $countries[$i]->country_code
                ]);
                $c = $countries[$i]->name;
                $this->info("Creating new records: $c ... $i ");
                
            }
        }
        $this->info("All countries generated and saved successfully");
        // $this->info($this->argument('country'));

    }
}
