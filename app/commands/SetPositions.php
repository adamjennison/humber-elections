<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SetPositions extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'set:positions';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Sets the positions of candidates throughout the election provided in the argument.';
    
    /**
     * The numer of seats below which the election is deemed a byelection
     * 
     * @var integer
     */
    protected $byelection_cutoff = 35;
    
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
		//
        
        $this->line('Welcome to the set position of the candidates command.');
        $election 	=	Election::where('d','=',$this->argument('election'))->firstOrFail();
        
        $this->line('Setting candidacy positions for '.$election->body->name.' '.$election->kind.' '.$election->d);
        if($election->candidacies->count() < $this->byelection_cutoff){
            $this->line('This election looks like a byelection - this script only works with full elections');
            exit;
        }
        $this->line($election->candidacies->count().' candidates in this election');
        foreach($election->body->districts as $district){
           // $cands  =   Candidacy::where('district_id',
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
			
		);
	}

}
