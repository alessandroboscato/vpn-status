@extends('layouts.app')

@section('content')

  <form action="{{route("servers.update", $data->id)}}" method="post">

      @csrf
      @method('PUT')

      <label for="name">Name
        <input type="text" name="name">
      </label>
      <label for="path">Path
        <input type="text" name="path" value="">
      </label>
      <button type="submit" name="button">Update</button>
    </form>
@endsection
