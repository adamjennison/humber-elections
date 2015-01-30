<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class LoadResults extends Command {

	// CSV headers: Name,surname*,forenames*,party*,votes*,district*,la,elected*
	// assumes all parties, candidates and candidacies have already been created



	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'load:results';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Takes a CSV and loads the results into the candidacy table.';
	/**
	* Set the default file path
	*
	* @var reader
	*/
	protected $file_path = '/var/www/elections/';
	/**
	* Declare a CSV reader instance so we can use it everywhere
	*
	* @var reader
	*/
	protected $Reader 	= 	null;
	/**
	*Declare elected variable to use throughtout code
	*
	* @var boolean
	*/
	protected $elected	= 	null;
	/**
	* Set the headers to true
	*
	* @var string
	*/
	protected $headers 	= 	true;
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
	public function fire()
	{
		
				Eloquent::unguard();

		if($this->option('has_headers')==='false' || $this->option('has_headers')==='f'){
			$this->headers=false;
		}
        
        if(!$this->option('filepath')==''){
            $this->file_path = $this->option('filepath');
        }
		$reader = new \EasyCSV\Reader($this->file_path.$this->argument('filename'),'r+',$this->headers);

		$this->line('Welcome to the load results command.');
		$this->info('We will be loading this file: '.$this->file_path.$this->argument('filename'));
		if(!$this->headers){
			$this->info('You have stated that there are no headers in this CSV');
			$this->info('The headers are: '.$this->line($reader->getHeaders()));
		}
		$faker = Faker\Factory::create('en_GB');

		//$this->line($reader->getHeaders());
		//var_dump(Body::all());
		while ($row = $reader->getRow()) {
			$this->line('Searching for a candidate');
			$candidate 	=  	Candidate::firstOrCreate(array(
						'surname' 		=> 	trim($row['surname']),
						'forenames'		=>	trim($row['forenames'])						
						));
			$this->line('Found: '.$candidate->id);
			$this->line('Searching for a party: '.$row['party']);

			$party		=	Party::firstOrCreate(array(
						'name'			=>	$row['party'],
				));

			if (strtolower($row['elected'])==='true'){
				$elected	= 1;
			}else{
				$elected	= 0;
			}

			$this->line('Searching for a district'.$row['district']);

			$district	= 	District::where('name','=',$row['district'])->firstOrFail();
            
            //dd($this->argument('election'));
			$election 	=	Election::where('d','=',$this->argument('election'))->firstOrFail();

			$candidacy 	= 	Candidacy::firstOrCreate(array(
					'election_id'	=>	$election->id,
					'candidate_id'	=>	$candidate->id,
					'party_id'		=>	$party->id,
					'district_id'	=>	$district->id,
					'votes'			=>	$row['votes'],
					'elected'		=>	$elected,
					'seats'			=>	$elected,

				));
			

			$candidacy->save();

			$this->line('Created a candidacy for '.$candidate->forenames.' '.$candidate->surname.' who is standing in the '.$election->name.' for the '.$party->name.' in the '.$district->name.' ward.');
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('filename', InputArgument::REQUIRED, 'Filename of the csv'),
			array('election', InputArgument::REQUIRED, 'Election date (yyyy-mm-dd)'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('has_headers', null, InputOption::VALUE_OPTIONAL, 'Headers in the first row - default is true, set to false or f if there are no headers or the first line will be missed.', null),
			array('filepath',null, InputOption::VALUE_OPTIONAL,'Set the file path with a trailing slash',null),
		);
	}

}
