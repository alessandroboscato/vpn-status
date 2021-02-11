@extends('layouts.app')
{{-- @dd($data); --}}
@section('content')
<div class="">
<span><a href="{{ route('servers.index')}}">Torna ai server</a></span>
</div>
<table>
  <tr>
    <td>Nome server</td>
    <td>IP address</td>
    <td>Bytes received</td>
    <td>Bytes sent</td>
    <td>Connected since</td>
    <td>Virtual address</td>
    <td>Last reference</td>
  </tr>
  @foreach ($data as $line=>$value)
    <tr>
      @foreach ($value as $column => $value)
        <td>{{$value}}</td>
      @endforeach
    </tr>
  @endforeach
</table>
@endsection
