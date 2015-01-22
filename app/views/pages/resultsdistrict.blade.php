@extends('layouts.master')
 
@section('title') 

  {{$page_title}} 
@stop

@section('content')

<p>
  {{ HTML::link('/bodies/'.$body->slug.'/elections/'.$election->d,$body->name.' election '.$election->d) }}

</p>
<?php $dite=$districts_in_this_election // ->toArray(); ?>
 <?php
        function itsHere($searchIn, $searchFor){
          $count=0;
        
          foreach($searchIn as $district){
            if( $district['id']  == $searchFor->id){
              return $count;
            }
            
            $count++;
          }
          return -1;
        }



        $district_index = itsHere($dite, $district) ?>

     


<div class="nav">
    
    
  @if(count($districts_in_this_election) > 1 )
        <?php  // Don't show the previous link if this is the first district for this election  ?>
    @unless($district_index == 0) 
      <?php $previous_district = $dite[$district_index - 1] ?>
      {{ HTML::link('/bodies/'.$body->slug .'/elections/'. $election->d .'/'. $body->districts_name .'/'. $previous_district->slug ,'&laquo;&nbsp;'.$previous_district->name.'&nbsp;&nbsp;&nbsp;') }}
    @endunless
    <?php //# Don't show the next link if this is the last district for this election ?>
    @unless ($district_index == count($dite) - 1)  
      <?php $next_district = $dite[$district_index + 1] ?>

      {{ HTML::link('/bodies/'.$body.slug .'/elections/'.$election->d .'/'. $body->districts_name .'/'. $next_district->slug ,$next_district->name .'&raquo;') }}
           
    @endunless
  @endif
  <p>
     {{ HTML::link('/bodies/'.$body->slug.'/'.$body->district_name.'/'.$district->slug,'All elections in '.$district->name.'&raquo;') }}
  </p>
</div>
<h1>
  {{ $district->name .' '.  $body->district_name }}
</h1>
{{-- @election_held = Candidacy.sum(:votes, :election => @election, :district => @district) %> --}}
@unless ( $election_held )
  <div class="warning">
    We don't have the results for this election yet.
  </div>
@endunless
<h2>Votes by candidate</h2>
<table>
  <tr class="header">
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th class="right">votes</th>
    <th class="right">% votes</th>
    <th>&nbsp;</th>
  </tr>
  <?php $count = 0 ?>
  @foreach($candidacies as $candidacy)
    <?php $count ++ ?>
    <tr class="vcard">
      <td>
        {{ $count }}
      </td>
      <td style="background-color: {{ $candidacy->party->colour }}">&nbsp;</td>
      <td class="candidate_name fn">
      {{ HTML::link('/candidates/'.$candidacy->candidate->id, $candidacy->candidate->short_name() ) }}          
      </td>
      <td class="org">
        {{-- <%= party_name(candidacy.labcoop, candidacy.party.name) %> --}}
        {{ $candidacy->party->name }}
      </td>
      @if( $election_held )
        <td class="right">
          {{--<%= commify(candidacy.votes) %> --}}
          {{ $candidacy->votes }}
        </td>
        <td class="right">
          {{-- <%= format_percent(candidacy.votes.to_f / @total_votes * 100) %> --}}
          <?php echo sprintf("%.2f%%", ( floatval($candidacy->votes) / $total_votes * 100)) ?>
        </td>
        @if ($candidacy->seats == 1 )
          <td class="elected">
            Elected
          </td>
        @else 
          <td>&nbsp;</td>
        @endif
      @else
        <td class="right">&mdash;</td>
        <td class="right">&mdash;</td>
        <td></td>
      @endif
    </tr>
  @endforeach
    <tr class="footer">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="right">
      {{--<%= commify(@total_votes) %>--}}
      {{ $total_votes }}
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<h2>Votes by party</h2>
<table>
  <tr class="header">
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th class="right highlight">seats won</th>
    <th>candidates</th>
    <th class="right">votes</th>
    <th class="right">% votes</th>
    <th class="right">votes per candidate</th>
    <?php $count = 0 ?>
    @foreach ($results_by_party as $row )
      <?php $count ++ ?>
      <tr>
        <td class="right">
          {{ $count }}
        </td>
        <td style="background-color: {{ $row->party_colour }} ">&nbsp;</td>
        <td>
           {{ $row->party_name }}
        </td>
        @if( $election_held )
          <td class="right highlight">
            {{ $row->num_seats }}
          </td>
        @else
          <td class="right highlight">&mdash;</td>
        @endif
        <td class="right">
          {{ $row->num_candidates }}
        </td>
        @if( $election_held )
          <td class="right">
            {{ $row->total_votes }}
          </td>
          <td class="right">
            {{--  <%= format_percent(row['total_votes'].to_f / @total_votes * 100) %>  --}}
            <?php echo sprintf("%.2f%%", ( floatval($row->total_votes) / $total_votes * 100)) ?>
          </td>
          <td class="right">
           {{-- <%= commify(row['total_votes'] / row['num_candidates']) %>  --}}
           {{ $row->total_votes / $row->num_candidates }}
          </td>
        @else
          <td class="right">&mdash;</td>
          <td class="right">&mdash;</td>
          <td class="right">&mdash;</td>
        @endif
      </tr>
    @endforeach
  </tr>
  <tr class="footer">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    @if( $election_held )
      <td class="right highlight">
        {{ $total_seats }}
      </td>
    @else
      <td class="right highlight">&nbsp;</td>
    @endif
    <td class="right">
      {{ $total_candidates }}
    </td>
    <td class="right">
      {{ $total_votes }}
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
@if( $poll )
  <p></p>
  <table>
    <tr>
      <td>Ballot papers issued</td>
      <td class="right">
        {{ $poll->ballot_papers_issued }}
      </td>
    </tr>
    <tr>
      <td>Ballot papers rejected</td>
      <td class="right">
        {{ $poll->ballot_papers_rejected }}
      </td>
    </tr>    
    <tr>
      <td>Electorate</td>
      <td class="right">
       {{ $poll->electorate }}
      </td>
    </tr>
    <tr>
      <td>Turnout</td>
      <td class="right">
        {{ sprintf("%.0f%%", $poll->turnout_percent()) }}
      </td>
    </tr>
  </table>
@endif

@stop
