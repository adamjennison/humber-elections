@extends('layouts.master')
 
@section('content')
 @foreach($users as $user)
        <p>{{ $user->surname }}</p>
    @endforeach
@stop
 
@section('sidebar')
  @parent
   
  <a href="#">Section specific links</a>
@stop

