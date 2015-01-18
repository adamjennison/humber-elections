@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')

    <% @page_title = "#{@district.name} #{@district.body.district_name}, #{@district.body.name}" %>
    <div class="nav">
      <p>
        <a href="/bodies/{{ $body->slug }}">
          &laquo;&nbsp;
          {{ $district->body->name }}
        </a>
      </p>
    </div>
    <h1>
      <%= "#{@district.name} #{@district.body.district_name}" %>
    </h1>
    <% # Candidates for 22 May 2014 council election %>
    <% @election = Election.get(8) %>
    <h2>
      <%= @district.name %>
      ward candidates for the
      <a href="/bodies/<%= @election.body.slug %>/elections/<%= @election.d %>">
        <%= @election.body.name %>
        election on
        <%= long_date(@election.d) %>
      </a>
    </h2>
    <table>
      <% Candidacy.all(:election => @election, :district => @district, :order => [:party_id]).each do |c| %>
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
    <% # TODO % turnout plotted over time %>
    <% # TODO map of district shown within Sutton boundary %>
    <h2>
      Candidates elected previously in
      <%= @district.name %>
      <%= @district.body.district_name %>
    </h2>
    <% Election.all(:body => @district.body, :order => [:d.desc]).each do |election| %>
      <% ccys = Candidacy.all(:election_id => election.id, :district_id => @district.id, :seats => 1, :order => [:votes.desc]) %>
      <% unless ccys == []   %>
        <h3>
          <a href="/bodies/<%= @district.body.slug %>/elections/<%= election.d %>/<%= election.body.districts_name %>/<%= @district.slug %>">
            <%= long_date election.d %>
            <%= election.kind %>
          </a>
        </h3>
        <table>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <% ccys.each do |ccy| %>
            <tr>
              <td>
                <%= ccy.position %>
              </td>
              <td style="background-color: <%= ccy.party.colour %>">&nbsp;</td>
              <td>
                <a href="/candidates/<%= ccy.candidate.id %>">
                  <%= ccy.candidate.short_name %>
                </a>
              </td>
              <td>
                <%= ccy.party.name %>
              </td>
            </tr>
          <% end %>
        </table>
      <% end %>
    <% end %>
@stop
