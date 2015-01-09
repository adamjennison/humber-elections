@extends('layouts.master')
 
@section('title') 
  {{$page_title}} 
@stop

@section('content')

  <h1>{{ $page_title }}</h1>

 @foreach($alphas as $letter)
   {{ HTML::link('candidates#'.$letter , $letter)   }}&nbsp;&nbsp;
 @endforeach
<?php $firstletter='' ?>
<table>
  <tbody>
    @foreach($candidates as $candidate)
      
      <?php if($candidate->surname[0]!=$firstletter) { ?>
      <?php $firstletter = $candidate->surname[0]; ?>
      <tr class="noborder">
        <td>
          &nbsp;
        </td>
        <td>
        </td>
      </tr>
      <tr class="noborder" id="{{ $firstletter }}" name="{{ $firstletter }}">
        <td class="strong" style="font-size: 300%;">
          {{ $firstletter }}
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>
        </td>
        <td>
        </td>
      </tr>
      <?php } ?>
      <tr>
        <td>
          {{ HTML::link('/candidates/'.$candidate->id, $candidate->surname )}}
        </td>
        <td>
          {{ $candidate->forenames }}
        </td>
      </tr>
      <?php // } ?>
    @endforeach
  </tbody>
</table>




@stop
 
@section('sidebar')
  @parent
   
  <a href="#">Section specific links</a>
@stop

