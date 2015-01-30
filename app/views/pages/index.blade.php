@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')

  <h1>{{ $page_title }}</h1>

   
<table>
  @foreach($elections as $election)
    <tr>
      <td>
		  {{ HTML::link('/bodies/'.$election->body->slug.'/elections/'.$election->d , date('d M Y', strtotime($election->d))) }}
      </td>
      <td>
		{{ $election->body->name }} - {{ $election->kind }}
      </td>  
	</tr>
  @endforeach	
</table>  
     




@stop
 
