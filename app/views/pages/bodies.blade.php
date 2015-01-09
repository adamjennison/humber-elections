@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')

  <h1>{{ $page_title }}</h1>





  @foreach($bodies as $body)
    <p>
		  {{ HTML::link('/bodies/'.$body->slug , $body->name )  }}
    </p>
  @endforeach	
     




@stop
 
