<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @include('layout.headerlink')
    <style>
		.grid-container {
		  display: grid;
		  grid-template-columns: auto auto auto;
		  padding: 10px;
		}
		.grid-item {
		  background-color: rgba(255, 255, 255, 0.8);
		  padding: 20px;
		  font-size: 30px;
		  text-align: center;
		}
        .pagination { justify-content: center!important; }
		</style>
</head>

<body>

            @include('layout.header')

     <!-- Start main content -->
	<main>

		<section id="mu-from-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-from-blog-area">
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>From Our Blog</h2>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa cum sociis.</p>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mu-from-blog-content">
										<div class="grid-container">

                                            @foreach($articledata as $rw)
											<div class="grid-item">
												<article class="mu-blog-item">
                                                    @php $Image = url('public/images').'/'.$rw->articleimage @endphp
													<a href="{{url('getdetailarticle',$rw->articleid)}}"><img src="{{$Image}}" alt="blgo image"></a>
													<div class="mu-blog-item-content">
														<ul class="mu-blog-meta">
															<li>BY: ADMIN </li>
															<li><a href="#"><i class="fa fa-comment-o"></i>26</a></li>
															<li><i class="fa fa-heart-o"></i>250</li>
														</ul>
														<h2 class="mu-blog-item-title"><a href="#">{{$rw->title}}</a></h2>
														<p>{!! $rw->description !!}</p>
													</div>
												</article>
											</div>
                                            @endforeach
										</div>

                                        {!! $articledata->links() !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>

            @include('layout.footer')

    @include('layout.footerlink')
</body>
</html>
