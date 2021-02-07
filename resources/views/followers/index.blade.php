@extends('layouts.master')

@section('title', 'Followers')

@section('content')
	<h1 class="title">Followers</h1>

	<hr>

	<div class="box">
		@each('followers.follower', $followers, 'follower', 'followers.no-follower')
	</div>
@endsection
