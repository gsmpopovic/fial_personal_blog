<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
@include('layouts.partials.meta')
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Inject Header -->
		@include('layouts.partials.header')

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Falling into a Labyrinth</h1>
				<span>Our Latest News</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Blog</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row gutter-40 col-mb-80">
						<!-- Post Content
						============================================= -->
						<div class="postcontent col-lg-9">

							<!-- Inject Posts --> 
							
							@yield('content')

							<!-- Pager
							============================================= -->
							{{-- <div class="d-flex justify-content-between mt-5">
								<a href="#" class="btn btn-outline-secondary">&larr; Older</a>
								<a href="#" class="btn btn-outline-dark">Newer &rarr;</a>
							</div> --}}
							<!-- .pager end -->

						</div><!-- .postcontent end -->

						<!-- Inject Sidebar -->
						@include('layouts.partials.sidebar')

					</div>

				</div>
			</div>
		</section><!-- #content end -->

		<!-- Inject Footer -->
@include('layouts.partials.footer')

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/plugins.min.js')}}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{asset('js/functions.js')}}"></script>


</body>
</html>