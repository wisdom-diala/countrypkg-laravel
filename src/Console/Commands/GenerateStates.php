<?php

namespace WisdomDiala\Countrypkg\Console\Commands;

// use App\Customs\GenerateMethod;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;

class GenerateStates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'g:s {country}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to generate all states around the world and store in the database';

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
    	$response = file_get_contents(__DIR__.'/../../resources/files/states.json');
		$states = json_decode($response);
       
        $country = $this->argument('country');
        $count_states = 0;
        if ($country == 'all') {
        	
			if ($states != null) {
				$no_of_states = count($states);
				for($i = 0; $i < $no_of_states; $i++) {
					$check_state = State::where(['name' => $states[$i]->name, 'country_id' => $states[$i]->country_id])->count();
					if ($check_state <= 0) {
						State::create([
							'country_id' => $states[$i]->country_id,
							'name' => $states[$i]->name
						]);
						++$count_states;
						$state_r = $states[$i]->name;
						$this->info("$state_r");
					}
				}
			}
			

		}else{
			if ($states != null) {
				$no_of_states = count($states);
				$country_db = Country::where('name', $country)->first();
				if ($country_db != null) {
					$this->info("Generating States for $country...");
					for($i = 0; $i < $no_of_states; $i++) {
						$check_state = State::where(['name' => $states[$i]->name, 'country_id' => $country_db->id])->count();
						if ($check_state <= 0) {
							if ($country_db->id == $states[$i]->country_id) {
								State::create([
									'country_id' => $country_db->id,
									'name' => $states[$i]->name
								]);
								++$count_states;
								$state_r = $states[$i]->name;
								$this->info("$state_r");
							}
						}
						
					}
				}else{
					dd("Ooops! No record found for the country you entered.");
				}
			}
		}

		$this->info("$count_states states generated for $country.");
	
    }
}
