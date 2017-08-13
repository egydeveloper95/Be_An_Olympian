@extends('layouts.master')

@section('content')


	<!-- begin Content -->
	<section>
		<!-- Error 404 -->
		<article class="error-404 text-center">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2>Sorry, this page do not exist</h2>
						<span>The link you clicked might be corrupted, or the page may have been removed.</span>
						<h3>404</h3>
						<h4>Page not found!</h4>
						<div class="search-box">
							<form action="http://www.coralixthemes.com/themeforest/html/extreme/contact-form.php" data-ajax="1" class="search">
								<div class="form-group">
									<label for="foot-news-email" class="sr-only">Search here...</label>
									<input type="email" class="form-control" name="foot-search" placeholder="Search here..." />
								</div>
								<button class="btn btn-search" type="submit"><i class="icon-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</article>
		<!-- end Error 404 -->
	</section>
	<!-- end Content -->



@endsection