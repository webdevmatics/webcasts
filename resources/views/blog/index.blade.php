@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2">
					@foreach ($posts as $post)

						@hasanyrole('subscriber|super-admin')
							@include('_blog-box')
						@else
							@if(empty($post->is_premium))
								@include('_blog-box')
							@else
									<div class="panel panel-info">
										<div class="panel-heading">
											<h3 class="panel-title">{{$post->title}}</h3>
										</div>
										<div class="panel-body">
											<p><a href="/subscribe">Subscribe Now</a> to view this post</p>
										</div>
									</div>
							@endif
						@endhasanyrole

					@endforeach
			</div>
		</div>	
	</div>
@endsection
