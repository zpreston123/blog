@extends('layouts.master')

@section('title', 'Profiles')

@section('content')
	{{ Form::open(['route' => ['profiles.index'], 'method' => 'GET']) }}
		<div class="control has-icons-left">
			{{ Form::search('q', null, ['class' => 'input is-medium', 'placeholder' => 'Search...']) }}
			<span class="icon is-left">
				<i class="fas fa-search"></i>
			</span>
		</div>
	{{ Form::close() }}

	<h1 class="title">All Results ({{ $profiles->count() }})</h1>

    <hr>

	<div class="box">
		@each('profiles.profile', $profiles, 'profile', 'no-profile')

		{{ $profiles->links('vendor.pagination.bulma') }}
	</div>
@endsection
