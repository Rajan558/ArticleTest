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
		<!-- Start Contact -->
		<section id="mu-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-contact-area">
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Say Hello!</h2>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa cum sociis.</p>
									</div>
								</div>
							</div>
								<!-- Start Contact Content -->
							<div class="mu-contact-content">
								<div class="row">

									<div class="col-md-12">
										<div class="mu-contact-form-area">
                                            @if(!empty(Session::get('message')))
                                            <div id ="msgs" class="alert alert-danger">{{ Session::get('message') }}</div>
                                            @endif
                                            <form action="{{url('/loginuser')}}" method="POST" id="loginuser" name="loginuser" class="mu-contact-form">
                                                @csrf
												<div class="form-group">
													<span class="fa fa-envelope mu-contact-icon"></span>
													<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
												</div>


												<div class="form-group">
													<span class="fa fa-envelope mu-contact-icon"></span>
													<input type="password" class="form-control" placeholder="Enter password" id="password" name="password" required>
												</div>


												<button type="submit" class="mu-send-msg-btn"><span>Login</span></button>
								        	</form>
										</div>
									</div>

								</div>
							</div>
							<!-- End Contact Content -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact -->



	</main>

            @include('layout.footer')

    @include('layout.footerlink')

    <script src="{{ url('public/assets/js/form-validation/jquery.validate.js') }}"></script>
    <script src="{{ url('public/assets/js/form-validation/additional-methods.min.js') }}"></script>
    <script src="{{ url('public/assets/js/form-validation/custom-form-validation.js') }}"></script>

    <script>
        $(document).ready(function ()
        {
            // login form validation
            $('#loginuser').validate({ // initialize the plugin
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    email: {
                        required: "Please Enter Email Address.",
                        email: "Your email address must be in the format of name@domain.com"
                    },
                    password: {
                        required: "Please Enter Password.",
                    }
                }
            });
        });
        </script>
</body>
</html>
