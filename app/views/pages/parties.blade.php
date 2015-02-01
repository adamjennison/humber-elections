@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')

  <h1>{{ $page_title }}</h1>





  @foreach($parties as $party)
    <p>
		  {{ HTML::link('/party/'.$party->name , $party->name )  }}
    </p>
  @endforeach	
     




@stop
 
