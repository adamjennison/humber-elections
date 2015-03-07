@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')
	


  <h1>{{ $page_title }}</h1>

  <p>This site is independent of all political parties, candidates and Councils.</p>
  <p>The code for this system is based on the original <a href="http://www.suttonelections.org.uk/" target="_blank" title="Have a look at Adrian Short's orginal Sutton Elections ">Sutton Elections</a> website written by <a href="https://twitter.com/adrianshort" target="_blank" title="Open Adrian Short's Twitter account in a new window">@AdrianShort</a>, many thanks for Adrian for creating it.</p>
  <p>I decided to convert Adrians' code from hist original Ruby base to the PHP based Laravel MVC.</p>
  <p>I'm quite fascinated by the way political candidates move through the system, I am also worried about democracy not being served due to lack of engagment in the political system.</p>
  <p>I wanted a system that will a allow a member of the public to find the candidates standing in their ward or consituency and find out if they've ever stood before and if so for what party.</p>
  <p>The data that the system holds is based on open election results from the Councils, it is available to all but nearly always in either PDF or html tables.  So far I've yet to find the data as an accessible CSV.</p>
  <p>To aid other developers I've taken the data and placed it into standard CSV's and released it on <a href="http://humberdata.org" title="Humberdata.org - open data for the Humber region" target="_blank">Humberdata.org</a>
  </p>




@stop