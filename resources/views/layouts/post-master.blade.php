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

						</div><!-- .postcontent end -->

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