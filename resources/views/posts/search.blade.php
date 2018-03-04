{{ Form::open(['route' => 'posts.search', 'style' => 'padding-bottom: 40px;', 'method' => 'GET']) }}
	<div class="control has-icons-left">
		{{ Form::search('q', null,['class' => 'input is-medium', 'placeholder' => 'Search...']) }}
	    <span class="icon is-left">
			<i class="fas fa-search"></i>
	    </span>
	</div>
{{ Form::close() }}
