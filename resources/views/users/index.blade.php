@extends('layouts.master')

@section('title', 'Users')

@section('content')
    <ul class="list-group">
        @foreach ($users as $user)
            <li class="list-group-item">{{ $user->name }}</li>
        @endforeach
    </ul>
@endsection
