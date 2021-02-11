@extends('layouts.app')
@dd($newArray);
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
    <td>Last reference</td>
  </tr>
  @foreach ($lines as $line)
    <tr>
      <td>{{$line}}</td>
    </tr>
  @endforeach
</table>
@endsection
