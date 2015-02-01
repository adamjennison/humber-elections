@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')

    <div class="nav">
      <p>
        {{ HTML::link('/bodies/'. $body->slug ,'&laquo;&nbsp;'.$district->body->name) }}
      </p>
    </div>
    <h1>
      {{ $district->name }} {{ $district->body->district_name }}
    </h1>

    {{--

    @foreach($elections as $election)

    <% # Candidates for 22 May 2014 council election %>
    <% @election = Election.get(8) %>
    <h2>
      {{ $district->name }}
      ward candidates for the
      {{ HTML::link('/bodies/'.$election->body->slug.'/elections/'.$election->d,$election->body->name.' election on '. $election->d) }}
    </h2>
    <table>
      <% Candidacy.all(:election => @election, :district => @district, :order => [:party_id]).each do |c| %>
      @foreach ()
        <% campaign = Campaign.first(:party => c.party, :election => @election) %>
        <tr class="vcard">
          <td style="background-color: <%= c.party.colour %>">&nbsp;</td>
          <td class="candidate_name fn">
            <a href="/candidates/<%= c.candidate.id %>">
              <%= c.candidate.short_name %>
            </a>
          </td>
          <td class="org">
            <% if campaign && campaign.party_url %>
              <a href="<%= campaign.party_url %>">
                <%= party_name(c.labcoop, c.party.name) %>
              </a>
            <% else %>
              <%= party_name(c.labcoop, c.party.name) %>
            <% end %>
          </td>
          <td>
            <% if campaign && campaign.manifesto_html_url %>
              <a href="<%= campaign.manifesto_html_url %>">
                manifesto
              </a>
            <% else %>
              &nbsp;
            <% end %>
          </td>
        </tr>
      <% end %>
    </table>

    @endforeach
    <% # TODO % turnout plotted over time %>
    <% # TODO map of district shown within Sutton boundary %>
  --}}
    <h2>
      Candidates elected previously in {{ $district->name }} {{ $district->body->district_name }}
    </h2>

    @foreach($body->elections->sortByDesc('d') as $election)
   


      <?php $ccys = Candidacy::where('election_id','=', $election->id)->where( 'district_id','=', $district->id)->where('seats','>=','1')->orderBy('votes','DESC')->get();
     // echo 'election_id:'.$election->id.'<br/>'.'district_id:'.$district->id.'<br/>';
     // dd(DB::getQueryLog());
       ?>


      @unless ( false )
        <h3>

        {{ HTML::link('/bodies/'. $district->body->slug .'/elections/'. $election->d .'/'. $election->body->districts_name .'/'. $district->slug,$election->d .' '.$election->kind) }}

        </h3>
        <table>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          
          @foreach($ccys as $ccy)
            <tr>
              <td>
                {{ $ccy->position }}
                <?php //var_dump($ccy) ?>
              </td>
              <td style="background-color: {{ $ccy->party->colour }}">&nbsp;</td>
              <td>
              {{ HTML::link('/candidates/'.$ccy->candidate->id,$ccy->candidate->short_name())   }}
              </td>
              <td>
                {{ HTML::link('/party/'.$ccy->party->name ,$ccy->party->name) }}
              </td>
            </tr>
          @endforeach
        </table>
      @endunless
    @endforeach
@stop
