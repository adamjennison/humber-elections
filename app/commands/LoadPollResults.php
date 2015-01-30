<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class LoadPollResults extends Command {

// CSV format: ward*,electorate*,ballot papers issued*,ballot papers rejected*,seats*   *required

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'load:pollresults';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This command loads a csv into the poll results table.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
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
		/// remove the checks on the db
		Eloquent::unguard();

		if($this->option('has_headers')==='false' || $this->option('has_headers')==='f'){
			$this->headers=false;
		}
        if(!$this->option('filepath')==''){
            $this->file_path = $this->option('filepath');
        }

		$reader = new \EasyCSV\Reader($this->file_path.$this->argument('filename'),'r+',$this->headers);

		$this->line('Welcome to the load poll results command.');
		$this->info('We will be loading this file: '.$this->file_path.$this->argument('filename'));
		if(!$this->headers){
			$this->info('You have stated that there are no headers in this CSV');
			$this->info('The headers are: '.$this->line($reader->getHeaders()));
		}
		

		
		while ($row = $reader->getRow()) {
		
            $this->line('Searching for a district'.$row['district']);
            $district	= 	District::where('name','=',$row['district'])->firstOrFail();
            $election 	=	Election::where('d','=',$this->argument('election'))->firstOrFail();
            $poll = Poll::create(array(
                'electorate'                =>  $row['electorate'],
                'ballot_papers_issued'      =>  $row['ballot_papers_issued'],
                'ballot_papers_rejected'    =>  $row['ballot_papers_rejected'],
                'seats'                     =>  $row['seats'],
                'district_id'               =>  $district->id,
                'election_id'               =>  $election->id,
            ));       
            $poll->save();
            $this->line('Created a new poll result');
                        
                        
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
			array('election', InputArgument::REQUIRED, 'Election id'),
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
