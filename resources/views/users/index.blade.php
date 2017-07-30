@extends('layouts.master')

@section('title', 'Users')

@section('content')
	@foreach ($users as $user)
		<ul>
			<li><img src="{{ $user->avatar }}"></li>
			<li>Name:
				<a href="/profile/{{ $user->id }}">
					{{ $user->name }}
				</a>
			</li>
			<li>Email: {{ $user->email }}</li>
		</ul>
	@endforeach
@endsection
