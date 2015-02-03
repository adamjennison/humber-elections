<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MergeParties extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'merge:parties';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Merge two parties';

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
		
        $winner =   (int)$this->argument('winner');
        $loser  =   (int)$this->argument('loser');
        
        Eloquent::unguard();
        $this->line('Winner');
        $winningParty   =   Party::findOrFail($winner);
        $this->line($winningParty->name);
        $this->line('');
        $this->line('');
        $this->line('Loser');
        $losingParty    =   Party::findOrFail($loser);
        $this->line($losingParty->name);
        $this->line('');
        $this->line('');
        
        
        
        $question = "Are you sure you want to merge the two parties, the loser will be deleted (yes or no)";
        if($this->confirm($question)){
            // we agree
            $this->line('yes');
            // Transfer all the loser's candidacies to the winner
            
            $result = DB::statement("
                  UPDATE candidacies
                  SET party_id = ?
                  WHERE party_id = ?;
      ",  array($winner, $loser));
      
      
            $loser = Party::find($loser);
            $loser->delete();
                
         
            $this->line('Merging completed.');
            $this->line('');
            //$this->showCandidate($winner);
            
        }else{
            // we dissagree
            $this->line('Aborting - no changes have been made to the database');
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
			array('winner', InputArgument::REQUIRED, 'id of winner'),
            array('loser', InputArgument::REQUIRED, 'id of loser'),
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
    
    protected function showPart($id)
    {
        //dd($id);
          $candidate = Candidate::findOrFail($id);
          
          $this->line('---------------------------------------------------------');
          $this->line($candidate->id .' '. $candidate->forenames .' '. $candidate->surname .' '. $candidate->gender );
          
          foreach($candidate->candidacies as $candidacy){
            $this->line($candidacy->election->body->name .' '. $candidacy->election->d .' '. $candidacy->party->name);
          }
          $this->line('---------------------------------------------------------');
    }
}
