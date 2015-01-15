@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')
    <div class="nav">
        <p>
            {{ HTML::link('bodies/{$body->slug}', '&laquo; '.$body->slug ) }}
        </p>
    </div>


    @if( count($elections_for_this_body > 1))
        <p>
            <?php // $election_index = $elections_for_this_body($election);
             
    
        </p>
    @endif
 

  <h1>{{ $body->name }} {{ $election->kind }}<br/>{{  date('d M Y', strtotime($election->d)) }}</h1>
  = @election.body.name
  = @election.kind
  %br
  = long_date(@election.d)

    
  - if @elections_for_this_body.size > 1
    %p
      - @election_index = @elections_for_this_body.index(@election)
      
      - unless @election_index == 0
        - @previous_election = @elections_for_this_body[@election_index - 1]
        %a{ :href => "/bodies/#{@election.body.slug}/elections/#{@previous_election.d}", :title => "Previous #{@election.body.name} election" }<
          &laquo;
          = @previous_election.kind
          &nbsp;
          = short_date(@previous_election.d)
        &nbsp;&nbsp;&nbsp;
    
      - unless @election_index == @elections_for_this_body.size - 1
        - @next_election = @elections_for_this_body[@election_index + 1]
        %a{ :href => "/bodies/#{@election.body.slug}/elections/#{@next_election.d}", :title => "Next #{@election.body.name} election" }<
          = @next_election.kind 
          &nbsp;
          = short_date(@next_election.d)
          &raquo;

%h1
  = @election.body.name
  = @election.kind
  %br
  = long_date(@election.d)

-# Does this election have any recorded votes, i.e. has it been held?
- @election_held = Candidacy.sum(:votes, :election => @election)

- unless @election_held
  .warning
    We don't have the results for this election yet.

%p= @election.reason

%p
  = @election.candidacies.count
  = "candidate".pluralize(@election.candidacies.count)
  - if @election_held
    contested
  - else 
    will be contesting
  -# We can't calculate the number of seats being contested if the election hasn't been held
  - if @election_held
    = @total_seats
    = "seat".pluralize(@total_seats)
    in
  = @total_districts
  = @election.body.district_name.pluralize(@total_districts)
  in Sutton.

- if @election_held

  %h2 Seats, votes and candidates by party

  %table
    %tr.header
      %th &nbsp;
      %th &nbsp;
      %th.highlight seats won
      %th votes
      %th % seats
      %th % votes
      %th votes per seat
      %th candidates
      %th votes per candidate
      -#
        %th relative popularity
        - @max_votes_per_candidate = @results_by_party.first.votez.to_f / @results_by_party.first.cands.to_f # We really need to scan the array for the max value
    - @results_by_party.each do |row|
      %tr
        %td{ :style => "background-color: #{row.colour}" } &nbsp;
        %td.data_party= row.name
        %td.data_seats.right.highlight= row.seatz
        %td.data_votes.right= commify(row.votez)
        - if @election_held
          %td.right= format_percent(row.seatz.to_f / @total_seats * 100)
          %td.right= format_percent(row.votez.to_f / @total_votes * 100)
          %td.data_votes_per_seat.right
            - if row.seatz > 0
              = commify(row.votez / row.seatz)
            - else
              &mdash;
        %td.data_candidates.right= row.cands
        - if @election_held
          %td.right= commify(row.votez / row.cands)
        -#
          %td.right= format_percent( ( row.votez.to_f / row.cands.to_f ) / @max_votes_per_candidate * 100)


    %tr.footer
      %td &nbsp;
      %td &nbsp;
      %td.right.highlight= @total_seats
      %td.right= commify(@total_votes)
      %td &nbsp;
      %td &nbsp;
      %td &nbsp;
      %td &nbsp;
      %td &nbsp;

  - if @election.ballot_papers_issued
    %table
      %tr
        %td Electorate
        %td.right= commify(@election.electorate)
      %tr
        %td Ballot papers issued
        %td.right= commify(@election.ballot_papers_issued)
      %tr
        %td Turnout
        %td.right= sprintf("%.0f%%", @election.ballot_papers_issued / @election.electorate.to_f * 100)
        
  %h2
    = @election.body.district_name.capitalize.pluralize(2)
    contested in this election

  %table
    %tr.header
      %th &nbsp;
      %th seats
      %th candidates
      %th votes
    - @results_by_district.each do |row|
      %tr
        %td
          %a{ :href => "/bodies/#{@election.body.slug}/elections/#{@election.d}/#{@election.body.districts_name}/#{row.district_slug}"}
            = row.name
        %td.right= row.seats
        %td.right= row.num_candidates
        %td.right= commify(row.votez)
    %tr.footer
      %td &nbsp;
      %td.right= @total_seats
      %td.right= @election.candidacies.count
      %td.right= commify(@total_votes)
- else
  %h2
    = @election.body.district_name.capitalize.pluralize(2)
    being contested at this election
  %table
    - @districts_in_this_election.each do |d|
      %tr
        %td
          %a{ :href => "/bodies/#{@election.body.slug}/#{@election.body.districts_name}/#{d['slug']}"}
            = d['name']

@stop
