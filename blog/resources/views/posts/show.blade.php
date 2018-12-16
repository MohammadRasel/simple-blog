@extends('layouts/master')


@section('content')
	<div class="col-md-8 blog-main">
		<h1>{{ $post->title }}</h1>
		{{ $post->body }}

		<hr>

		<div class="comments">
			<ul class="list-group">
				@foreach($post->comments as $comment)
					<li class="list-group-item">
						<strong>
							{{$comment->user->name}}:
						</strong>
						    {{ $comment->body }}
						    <p><i> {{ $comment->created_at->diffForHumans()}} &nbsp;</i></p> 
					</li>
				@endforeach
			</ul>
		</div>

		<hr>
		@if(Auth::check())
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/posts/{{$post->id}}/comments">

					{{ csrf_field() }}

					<div class="form-group">
						<textarea class="form-control" name="body" placeholder="Your comment here."></textarea>
					</div>
					<div class="form-group">
		  				<button type="submit" class="btn btn-primary">Add Comment</button>
		  			</div>
				</form>

				@include('layouts/errors')
			</div>
		</div>
		@endif
	</div>
@endsection

