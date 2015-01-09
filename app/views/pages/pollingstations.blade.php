@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')

  <h1>{{ $page_title }}</h1>




<div class="warning">
  <p>If you've got a postal vote but haven't posted it yet, you can take it to ANY polling station before 10PM tonight (Thursday 22 May 2014).</p>
  <p>If you've got an ordinary vote (not postal) you MUST vote at the right polling station for your address. Use the {{ HTML::link('/' , 'postcode search box')  }} on the home page to find your polling station and the candidates for your ward.</p>
</div>
<table>
  @foreach($pollingstations as $pollingstation)
    <tr>
      <td>
		  {{ HTML::link('http://www.openstreetmap.org/?mlat='.$pollingstation->lat.'&mlon='.$pollingstation->lng.'&zoom=16' , $pollingstation->name )  }}
      </td>
      <td>
		{{ $pollingstation->address }}
      </td>  
      <td>
		{{ $pollingstation->postcode_id }}
      </td>
	</tr>
  @endforeach	
</table>      




@stop
 
