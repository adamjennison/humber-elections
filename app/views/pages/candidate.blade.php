@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')
  
  {{ HTML::link('candidates/', '&laquo; All candidates' ) }}

  <h1>{{ $page_title }}</h1>

  <h2>Elections Contested</h2>

  <table>
    <tdody>
      <tr>
        <th>
          &nbsp;
        </th>
        <th>
          date
        </th>
        <th>
          party
        </th>
        <th>
          body
        </th>
        <th>
          district
        </th>
        <th>
          votes
        </th>
        <th>
          position
        </th>
        <th>
          &nbsp;
        </th>
      </tr>
     
    @foreach($candidacies as $candidacy)
        <tr>
          <td style="background-color: {{ $candidacy->party_colour }}">
            &nbsp;
          </td>
          <td >
           {{ HTML::link('/bodies/'. $candidacy->body_slug .'/elections/'. $candidacy->d, date('d M Y', strtotime($candidacy->d))) }}
          </td>
          <td>
            {{ $candidacy->party_name }}
          </td>
          <td>
             {{ HTML::link('/bodies/'. $candidacy->body_slug, $candidacy->body_name) }}
          </td>
          <td>

          {{ HTML::link('/bodies/'. $candidacy->body_slug .'/elections/'. $candidacy->d .'/'. $candidacy->districts_name .'/'. $candidacy->district_slug,  $candidacy->district_name) }}
          </td>

          @if (($candidacy->votes)> 1)
            <td>
              {{ $candidacy->votes }}
            </td>
            <td>   
              {{  \JennisonAdam\tools\NumberFormatter::addOrdinalNumberSuffix($candidacy->position) }}
            </td>
            <td>
              @if (($candidacy->position)== 1)
                Elected
              @else
                Not elected
              @endif
            </td>
          @else
             <td>
              &mdash;
            </td>
            <td>
              &mdash;
            </td>
            <td>
              &mdash;
            </td>
          @endif



        </tr>
      @endforeach     
    </tdody>
  </table>


<div class="warning">
  <p>
    This might not be the complete electoral history for this candidate. They might have stood in elections outside the region or in elections that we have no information about.
  </p>
  <p >
    Some candidates have more than one profile page due to them using slightly different names in different elections or having changed their name. See the full {{ HTML::link('candidates#'.$candidate->surname[0] , 'candidates list' )   }}  for details. 
  </p>
  <p>
      You can always search Google for this {{ HTML::link('http://google.co.uk/search?q='.$candidate->fullName,'candidate') }} 
  </p>
    @if($yournextmp['total']>0)
  <p>
      According to YourNextMp.com {{ $candidate->fullname }} is standing or has stood {{ dd($yournextmp) }}
  </p>
   @endif
</div>


@stop
