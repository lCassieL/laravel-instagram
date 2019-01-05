@extends('layouts.app')

@section('content')
    @foreach ($photos as $photo)
        <img src="{{asset('storage/images/'.$photo->name)}}" width="400" height="200">
    @endforeach
@endsection
