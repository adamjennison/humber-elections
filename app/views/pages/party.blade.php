@extends('layouts.master')
 
@section('title') 
  {{$page_title}} {{$party->name}} 
@stop

@section('content')
  <div class="nav">{{ HTML::link('/parties','Political Parties') }}</div>
  <h1>{{ $page_title }} for the {{$party->name}} </h1>
    <h2>Candidacies</h2>
    
<table>
    <tr>
        <th>Candidate</th>
        <th>Ward</th>
        <th>Election</th>
        <th>Votes</th>
        <th>Position</th>
        <th>&nbsp;</th>
    </tr>
  @foreach($party->candidacies as $candidacy)
    <tr>
      <td>
          {{ HTML::link('/candidates/'.$candidacy->candidate->id, $candidacy->candidate->FormatedName ) }} 
      </td>
      <td>
          {{ HTML::link('/bodies/'.$candidacy->district->body->slug.'/'.
             $candidacy->district->body->districts_name.'/'.
             $candidacy->district->slug , $candidacy->district->name.' '. 
             $candidacy->district->body->district_name ) }}
      </td>
      <td>
          {{ HTML::link('/bodies/'.$candidacy->district->body->slug.'/elections/'.$candidacy->election->d ,
               date('d M Y', strtotime($candidacy->election->d))) }}
      </td>
        <td class="right"> 
            {{ $candidacy->votes }}
      </td>
      <td>
          {{ \JennisonAdam\tools\NumberFormatter::addOrdinalNumberSuffix($candidacy->position) }}

      </td>  

        @if ($candidacy->seats == 1 )
          <td class="elected">
            Elected
          </td>
        @else 
          <td>&nbsp;</td>
        @endif
	</tr>
  @endforeach	
</table>      


@stop
 
