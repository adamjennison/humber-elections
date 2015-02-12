@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')
  <div class="nav">{{ HTML::link('/bodies','Governement bodies') }}</div>
  <h1>{{ $page_title }}</h1>    
    <div>
        {{$body->narrative}}
    </div>
    <div>More information can be found on their {{ HTML::link($body->url,'website') }}</div>
    <div>&nbsp;</div>
    <div>Phone: {{ $body->contact_phone  }}</div>
    <div>Email: {{ HTML::link('mailto://'.$body->contact_email,$body->contact_email)  }}</div>
    <h2>Elections</h2>
<table>
  @foreach($elections as $election)
    <tr>
      <td>
		  {{ HTML::link('/bodies/'.$body->slug.'/elections/'.$election->d , date('d M Y', strtotime($election->d))) }}
      </td>
      <td>
		{{ $election->kind }}
      </td>  
	</tr>
  @endforeach	
</table>      

<h2>{{ $body->districts_name }}</h2>

@foreach($districts as $district)
	<p>
		{{ HTML::link('/bodies/'.$body->slug.'/'.$body->districts_name.'/'.$district->slug , $district->name ) }}
	</p>
@endforeach

@stop
 
