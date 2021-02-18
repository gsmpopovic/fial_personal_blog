@extends('layouts.master')

@section('content')

@if(count($posts) >= 1)

<h1 style="text-align:center">{{$result}}</h1>

<hr>

<hr>

    <!-- Posts
           ============================================= -->
		   <div id="posts" class="row grid-container gutter-30">

			@foreach ($posts as $post)
	
				<div class="entry col-12">
					<div class="grid-inner">
						<div class="entry-image">
							<a href="{{ $post->slug }}" data-lightbox="image"><img src="{{ $post->featured_image }}"
									alt="Standard Post with Image"></a>
						</div>
						<div class="entry-title">
							<h2><a href="{{ $post->slug }}">{{ $post->title }}</a></h2>
						</div>
						<div class="entry-meta">
							<ul>
								{{-- <li><i class="icon-calendar3"></i>{{$post->created_at}}</li> --}}
	
								<li><i
										class="icon-calendar3"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('m/d/Y') }}
								</li>
	
								<li><a href="#"><i class="icon-user"></i>{{ $post->user->name }}</a></li>
								<li><i class="icon-folder-open"></i> <a
										href="tag/{{ $post->tags[0]->slug }}">{{ $post->tags[0]->name }}</a></li>
								<li><i class="icon-bookmark"></i>{{ $post->readtime }}</li>
	
								{{-- <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13 Comments</a></li>
													<li><a href="#"><i class="icon-camera-retro"></i></a></li> --}}
							</ul>
						</div>
						<div class="entry-content">
							<p>{{ $post->summary }}</p>
							<a href="{{route('single-post', $post->slug)}}" class="more-link">Read More</a>
						</div>
					</div>
				</div>

			@endforeach
	
	
	
		</div><!-- #posts end -->
	

@else

<h1 style="text-align:center">{{$result}}</h1>

@endif

@endsection