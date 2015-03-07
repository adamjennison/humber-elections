@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')


  <h1>{{ $page_title }}</h1>

  
  @foreach($candidates as $candidate)
  	 {{ HTML::link('/candidates/'.$candidate->id, $candidate->forenames.' '.$candidate->surname )}}
  @endforeach

@stop