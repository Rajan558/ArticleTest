<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @include('layout.headerlink')
</head>

<body>

            @include('layout.header')


	<!-- Start main content -->
	<main>
		<!-- Start Blog -->
		<section id="mu-blog" class="mu-blog-single">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-blog-area">
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-blog-left">
										<!-- start single item -->
										<article class="mu-blog-item">
                                            @php $Image = url('public/images').'/'.$vr->articleimage @endphp
											<img src="{{$Image}}" alt="blgo image">
											<div class="mu-blog-item-content">

												<h1 class="mu-blog-item-title">{{$vr->title}}</h1>
												<ul class="mu-blog-meta">
													<li>BY: ADMIN </li>
													<li><a href="#"><i class="fa fa-comment-o"></i>26</a></li>
													<li><i class="fa fa-heart-o"></i>250</li>
												</ul>
                                                {!! $vr->description !!}
											</div>
											<!-- End Blog Post Tag -->



										</article>
										<!-- End single item -->
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Blog -->

	</main>

            @include('layout.footer')

    @include('layout.footerlink')

</body>
</html>
