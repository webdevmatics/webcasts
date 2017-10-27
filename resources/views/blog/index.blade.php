@extends('layout.front')

@section('content')

	@foreach ($posts as $post)
		
		@hasanyrole('subscriber|super-admin')

		<div class="panel panel-default">
				<h3>{{$post->title}}</h3>
				<div class="panel-body">
					{{$post->content}}
				</div>
			</div>	
@else
	@if(empty($post->is_premium))
		<div class="panel panel-default">
				<h3>{{$post->title}}</h3>
				<div class="panel-body">
					{{$post->content}}
				</div>
			</div>	

			@else
			<h4>you need to be subscriber</h4>
		@endif
			@endrole
	@endforeach

@endsection
