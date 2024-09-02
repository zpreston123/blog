@extends('layouts.master')

@section('title', 'Profiles')

@section('content')
	<form action="{{ route('profiles.index') }}" method="GET">
		<div class="control has-icons-left">
			<input name="q" class="input is-medium" placeholder="Search...">
			<span class="icon is-left">
				<i class="fas fa-search"></i>
			</span>
		</div>
	</form>

	<h1 class="title">
		All Results ({{ $profiles->count() }})
	</h1>

    <hr>

	<div class="box">
		@each('profiles.profile', $profiles, 'profile', 'profiles.no-profile')

		{{ $profiles->links('vendor.pagination.bulma') }}
	</div>
@endsection
