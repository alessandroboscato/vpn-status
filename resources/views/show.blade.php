@extends('layouts.app')

@section('content')
<div class="">
<span><a href="{{ route('servers.index')}}">Torna ai server</a></span>
</div>
<table>
  @foreach ($lines as $line)
    <tr>
      <td>{{$line}}</td>
    </tr>
  @endforeach
</table>
@endsection
