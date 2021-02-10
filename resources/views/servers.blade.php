@extends('layouts.app')

@section('content')
  <div class="">
  <span><a href="{{ route('servers.create')}}">Crea un nuovo server</a></span>
  </div>
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
        <span><a href="{{ route('servers.edit', $server->id)}}">Edit</a></span>
        <form style="display: inline-block" class="" action="{{ route('servers.destroy', $server->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn button delete" type="submit">Elimina</button>
            </form>
      </td>
    </tr>
  @endforeach
</table>
@endsection
