@extends('layouts.app')

@section('content')
<table>
  <tr>
    <thead>
      <td>Id</td>
      <td>Name</td>
      <td>Path</td>
      <td>Created at</td>
      <td>Actions</td>
    </thead>
  </tr>
  @foreach ($servers as $server)
    <tr>
      <td>{{$server->id}}</td>
      <td>{{$server->name}}</td>
      <td>{{$server->path}}</td>
      <td>{{$server->created_at}}</td>
      <td>
        <span>Edit</span>
        <span>Delete</span>
      </td>
    </tr>
  @endforeach
</table>
@endsection
