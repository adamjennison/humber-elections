@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')
    <div class="nav">
        <p>
            {{ HTML::link('bodies/'.$body->slug, '&laquo; '.$body->name ) }}
        </p>
        <?php $eftb=$elections_for_this_body->toArray() ?>

	  @if (count($eftb) > 1)
	    <p>
	      <?php
	      function itsHere($searchIn, $searchFor){
	      	$count=0;
	      
	      	foreach($searchIn as $election){
	      		if( $election['id']  == $searchFor->id){
	      			return $count;
	      		}
	      		
	      		$count++;
	      	}
	      	return -1;
	      }



	      $election_index = itsHere($eftb, $election) ?>

	      <?php 

	      //echo 'Election index='.$election_index.'<br/>';
        //var_dump($eftb);
	      //die();
	      ?>
	       @unless ($election_index == 0)
	        <?php $previous_election = $eftb[$election_index - 1] ?>
	        {{ HTML::link( '/bodies/'.$body->slug.'/elections/'.$previous_election['d'],'&laquo;'.$previous_election['kind'].'&nbsp;'.$previous_election['d'],array('title'=>'Previous '.$body->name.' Election') ) }}


	        &nbsp;&nbsp;&nbsp;
	      @endunless
	      @unless ($election_index == count($eftb)-1)
	        <?php $next_election = $eftb[$election_index + 1] ?>
	        {{ HTML::link( '/bodies/'.$body->slug.'/elections/'.$next_election['d'],$next_election['kind'].'&nbsp;'.$next_election['d'].'&raquo;',array('title'=>'Next '.$body->name.' Election') ) }}

	      @endunless
	    </p>
	  @endif
	</div>
	
<h1>
  {{ $election->name }}
  {{ $election->kind }}
  <br/>
  {{ $election->d }}
</h1>

<!-- # Does this election have any recorded votes, i.e. has it been held? -->

@unless ($electionHeld)
  <div class="warning">
    We don't have the results for this election yet.
  </div>
@endunless
<p>
  {{ $election->reason }}
</p>


<p>
  {{ $candidacies->count() }} {{ \JennisonAdam\tools\NumberFormatter::pluralize($candidacies->count(),'candidate') }}
  @if( $electionHeld )
    contested
  @else
    will be contesting
  @endif
  <!--<% # We can't calculate the number of seats being contested if the election hasn't been held %>-->
  @if(@electionHeld )
    {{ $total_seats }}
    {{ \JennisonAdam\tools\NumberFormatter::pluralize($total_seats,'seat') }}
    in
  @endif
  {{ $total_districts }}
  {{ \JennisonAdam\tools\NumberFormatter::pluralize($body->district_name,$body->district_name) }}
  in Sutton.
</p>

 @if($electionHeld)
  <h2>Seats, votes and candidates by party</h2>
  <table>
    <tr class="header">
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th class="highlight">seats won</th>
      <th>votes</th>
      <th>% seats</th>
      <th>% votes</th>
      <th>votes per seat</th>
      <th>candidates</th>
      <th>votes per candidate</th>
      <th>relative popularity</th>
        <?php $max_votes_per_candidate = floatval($results_by_party[0]->votez) / floatval($results_by_party[0]->cands) # We really need to scan the array for the max value ?>
      
    </tr>
    @foreach($results_by_party as $row)
      <tr>
        <td style="background-color: {{ $row->colour }}">&nbsp;</td>
        <td class="data_party">
          {{ $row->name }}
        </td>
        <td class="data_seats right highlight">
          {{ $row->seatz }}
        </td>
        <td class="data_votes right">
          {{ $row->votez }}
        </td>
        @if($electionHeld)
          <td class="right">
            <?php echo sprintf("%.2f%%", ( floatval($row->seatz) / $total_seats * 100)) ?>
          </td>
          <td class="right">
            <?php echo sprintf("%.2f%%", ( floatval($row->votez) / $total_votes * 100)) ?>
          </td>
          <td class="data_votes_per_seat right">
            @if($row->seatz > 0 )
              {{ $row->votez / $row->seatz }}
            @else
              &mdash;
            @endif
          </td>
        @endif
        <td class="data_candidates right">
          {{ $row->cands }}
        </td>
        @if ( $electionHeld )
          <td class="right">
            {{ $row->votez / $row->cands }}
          </td>
        @endif

          <td class="right">
          
           <?php echo sprintf("%.2f%%", ( floatval($row->votez) / floatval($row->cands) ) / $max_votes_per_candidate * 100) ?>
          </td>
        
      </tr>
    @endforeach
    <tr class="footer">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td class="right highlight">
        {{ $total_seats }}
      </td>
      <td class="right">
        {{ $total_votes }}
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>



  @if($election->ballot_papers_issued )
    <table>
      <tr>
        <td>Electorate</td>
        <td class="right">
          {{ $election->electorate }}
        </td>
      </tr>
      <tr>
        <td>Ballot papers issued</td>
        <td class="right">
          {{ $election->ballot_papers_issued }}
        </td>
      </tr>
      <tr>
        <td>Turnout</td>
        <td class="right">
          <?php sprintf("%.0f%%", $election->ballot_papers_issued / $election->electorate.to_f * 100) ?>
        </td>
      </tr>
    </table>
  @endif
  <h2>
    {{ $body->district_name }}
    contested in this election
  </h2>
  <table>
    <tr class="header">
      <th>&nbsp;</th>
      <th>seats</th>
      <th>candidates</th>
      <th>votes</th>
    </tr>
    @foreach( $results_by_district as $row )
      <tr>
        <td>
          {{ HTML::link('bodies/'.$body->slug.'/elections/'.$election->d.'/'.$body->districts_name.'/'.$row->district_slug,$row->name) }}
          
          </a>
        </td>
        <td class="right">
          {{ $row->seats }}
        </td>
        <td class="right">
          {{ $row->num_candidates }}
        </td>
        <td class="right">
          {{ $row->votez }}
        </td>
      </tr>
    @endforeach
    <tr class="footer">
      <td>&nbsp;</td>
      <td class="right">
        {{ $total_seats }}
      </td>
      <td class="right">
        {{ $election->candidacies->count() }}
      </td>
      <td class="right">
        {{ $total_votes }}
      </td>
    </tr>
  </table>
@else
  <h2>
    <%= @election.body.district_name.capitalize.pluralize(2) %>
    being contested at this election
  </h2>
  <table>
    <% @districts_in_this_election.each do |d| %>
      <tr>
        <td>
          <a href="bodies/<%= @election.body.slug %>/<%= @election.body.districts_name %>/<%= d['slug'] %>">
            <%= d['name'] %>
          </a>
        </td>
      </tr>
    <% end %>
  </table>
@endif
<!---->
@stop
