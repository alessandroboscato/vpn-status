@extends('layouts.app')

@section('content')
  <form action="{{route("servers.store")}}" method="post">

    @csrf
    @method('POST')

    {{-- <label for="abc">ID
      <input type="text" name="" value="">
    </label> --}}
    <label for="name">Name
      <input type="text" name="name" value="">
    </label>
    <label for="path">Path
      <input type="text" name="path" value="">
    </label>
    <button type="submit" name="button">Save</button>
  </form>
@endsection
