@extends('layouts.master')
 
@section('title') 

  {{$page_title}} 
@stop

@section('content')

<p>
  {{ HTML::link('/bodies/'.$body->slug.'/elections/'.$election->d,$body->name.' election '.$election->d) }}

</p>
<div class="nav">
    
    <?php //$dite=$districts_in_this_election->toArray() ?>
  @if(count($districts_in_this_election) > 1 )
        <?php //$district_index = $districts_in_this_election.index($district) ?>
    @unless($district_index == 0)  # Don't show the previous link if this is the first district for this election 
      <% @previous_district = @districts_in_this_election[@district_index - 1] %>
      <a href="/bodies/<%= @election.body.slug %>/elections/<%= @election.d %>/<%= @election.body.districts_name %>/<%= @previous_district.slug %>"><
        &laquo;&nbsp;
        <%= @previous_district.name %>
      </a>
      &nbsp;&nbsp;&nbsp;
    @endunless
    <% unless @district_index == @districts_in_this_election.size - 1 # Don't show the next link if this is the last district for this election %>
      <% @next_district = @districts_in_this_election[@district_index + 1] %>
      <a href="/bodies/<%= @election.body.slug %>/elections/<%= @election.d %>/<%= @election.body.districts_name %>/<%= @next_district.slug %>"><
        <%= @next_district.name  %>
        &raquo;
      </a>
    <% end %>
  @endif
  <p>
     {{ HTML::link('/bodies/'.$body->slug.'/'.$body->district_name.'/'.$district->slug,'All elections in '.$district->name.'&raquo;') }}
  </p>
</div>
<h1>
  <%= @district.name + " " + @district.body.district_name %>
</h1>
<% @election_held = Candidacy.sum(:votes, :election => @election, :district => @district) %>
<% unless @election_held %>
  <div class="warning">
    We don't have the results for this election yet.
  </div>
<% end %>
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
  <% count = 0 %>
  <% @candidacies.each do |candidacy| %>
    <% count += 1 %>
    <tr class="vcard">
      <td>
        <%= count %>
      </td>
      <td style="background-color: <%= candidacy.party.colour %>">&nbsp;</td>
      <td class="candidate_name fn">
        <a href="/candidates/<%= candidacy.candidate.id %>">
          <%= candidacy.candidate.short_name %>
        </a>
      </td>
      <td class="org">
        <%= party_name(candidacy.labcoop, candidacy.party.name) %>
      </td>
      <% if @election_held %>
        <td class="right">
          <%= commify(candidacy.votes) %>
        </td>
        <td class="right">
          <%= format_percent(candidacy.votes.to_f / @total_votes * 100) %>
        </td>
        <% if candidacy.seats == 1 %>
          <td class="elected">
            <%= "Elected" %>
          </td>
        <% else %>
          <td>&nbsp;</td>
        <% end %>
      <% else %>
        <td class="right">&mdash;</td>
        <td class="right">&mdash;</td>
        <td></td>
      <% end %>
    </tr>
  <% end %>
  <tr class="footer">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="right">
      <%= commify(@total_votes) %>
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
    <% count = 0 %>
    <% @results_by_party.each do |row| %>
      <% count += 1 %>
      <tr>
        <td class="right">
          <%= count %>
        </td>
        <td style="background-color: <%= row['party_colour']  %>">&nbsp;</td>
        <td>
          <%= row['party_name'] %>
        </td>
        <% if @election_held %>
          <td class="right highlight">
            <%= row['num_seats'] %>
          </td>
        <% else %>
          <td class="right highlight">&mdash;</td>
        <% end %>
        <td class="right">
          <%= row['num_candidates'] %>
        </td>
        <% if @election_held %>
          <td class="right">
            <%= commify(row['total_votes']) %>
          </td>
          <td class="right">
            <%= format_percent(row['total_votes'].to_f / @total_votes * 100) %>
          </td>
          <td class="right">
            <%= commify(row['total_votes'] / row['num_candidates']) %>
          </td>
        <% else %>
          <td class="right">&mdash;</td>
          <td class="right">&mdash;</td>
          <td class="right">&mdash;</td>
        <% end %>
      </tr>
    <% end %>
  </tr>
  <tr class="footer">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <% if @election_held %>
      <td class="right highlight">
        <%= @total_seats %>
      </td>
    <% else %>
      <td class="right highlight">&nbsp;</td>
    <% end %>
    <td class="right">
      <%= @total_candidates %>
    </td>
    <td class="right">
      <%= commify(@total_votes) %>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<% if @poll %>
  <p></p>
  <table>
    <tr>
      <td>Ballot papers issued</td>
      <td class="right">
        <%= commify(@poll.ballot_papers_issued) %>
      </td>
    </tr>
    <tr>
      <td>Electorate</td>
      <td class="right">
        <%= commify(@poll.electorate) %>
      </td>
    </tr>
    <tr>
      <td>Turnout</td>
      <td class="right">
        <%= sprintf("%.0f%%", @poll.turnout_percent) %>
      </td>
    </tr>
  </table>
<% end %>

@stop
