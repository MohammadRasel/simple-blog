@extends('layouts/master')


@section('content')

	<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    	<div class="col-md-6 px-0">
      		<h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
      		<p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
    	</div>
  	</div>



	<div class="col-md-8 blog-main">


	  <h3 class="pb-3 mb-4 font-italic border-bottom">
	  	From the Simple Blog
	  </h3>
	  @foreach($posts as $post)

	 	 @include('posts/post')

	  @endforeach



	  <nav class="blog-pagination">
	    	<a class="btn btn-outline-primary" href="#">Older</a>
	    	<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
	  </nav>

	</div><!-- /.blog-main -->

@endsection