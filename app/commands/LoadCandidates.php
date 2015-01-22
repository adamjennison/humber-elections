<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class LoadCandidates extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'load:candidates';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Loads the candidate data from a CSV. CSV should be in xxxxxx format.';

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
		
		


		if($this->option('has_headers')==='false' || $this->option('has_headers')==='f'){
			$this->headers=false;
		}

        if(!$this->option('filepath')==''){
            $this->file_path = $this->option('filepath');
        }
        
		$reader = new \EasyCSV\Reader($this->file_path.$this->argument('filename'),'r+',$this->headers);

		$this->line('Welcome to the load candidate command.');
		$this->info('We will be loading this file: '.$this->file_path.$this->argument('filename'));
		if(!$this->headers){
			$this->info('You have stated that there are no headers in this CSV');
			$this->info('The headers are: '.$this->line($reader->getHeaders()));
		}
		

		//$this->line($reader->getHeaders());
		//var_dump(Body::all());
		while ($row = $reader->getRow()) {

			$candidate = new Candidate();
			$candidate->surname		=	trim( $row['surname']  	);
			$candidate->forenames	=	trim( $row['forenames']	);
			$firstname=explode(' ',$candidate->forenames);
			$json = json_decode(file_get_contents('http://api.genderize.io?name='.urlencode($firstname[0])), true);
			$candidate->gender 		=	$json['gender'];
			$candidate->save();

			$this->info('Created a new '.$candidate->gender.' candidate caled '.$candidate->forenames.' '.$candidate->surname);
			

			//$candidate->
    		//$this->line($row);
			// find out the first name and genderize it..
			//$json = json_decode(file_get_contents('http://api.genderize.io?name='.urlencode($firstname[0])), true);

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
