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
              @if (($candidacy->elected)== 1)
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
  </div>
    @if(!is_null($yournextmp))
 
      
      @if(array_key_exists('2015',$yournextmp['result'][0]['standing_in']))
      
        According to {{ HTML::link('https://yournextmp.com/person/'.$candidate->ynmp_id,'YourNextMp.com') }} {{ $candidate->fullname }}
         is standing as an MP in the 2015 general election for the 
         {{ $yournextmp['result'][0]['party_memberships']['2015']['name'] }} 
         in the {{ $yournextmp['result'][0]['standing_in']['2015']['name'] }} constituency.
         
         Other candidates are:<br/><br/>
      
      @if(!is_null($constituency))
      <table>
        <tbody>
      <tr class="noborder">
        <td>
         <strong>Name</strong>
        </td>
        <td>
         <strong>Party</strong>
        </td>
      </tr>
        @foreach($constituency['result']['memberships'] as $wanabe_an_mp)
            @if(array_key_exists('2015',$wanabe_an_mp['person_id']['standing_in']))
            	@if(!((int)$wanabe_an_mp['person_id']['id']==(int)$candidate->ynmp_id))
                <tr>
                	
                    <td>
                        {{ HTML::link('/candidates/ynmp/'.$wanabe_an_mp['person_id']['id'].'/name/'.$wanabe_an_mp['person_id']['name'], $wanabe_an_mp['person_id']['name'] )}}
                        
                    </td>
                    <td>
                        {{ $wanabe_an_mp['person_id']['party_memberships']['2015']['name'] }}
                    </td>
                   
                </tr>
                @endif
            @endif
        @endforeach
      @endif
      
      @endif
        </tbody>
</table>

      @if(array_key_exists('image',$yournextmp['result'][0]))
      
        <img class="candidate" src="{{ $yournextmp['result'][0]['image'] }}" border="2" alt="{{$page_title}}" title="{{$page_title}}">
      
      @endif
 
   @endif



@stop
