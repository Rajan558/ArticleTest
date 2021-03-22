 <!--START SCROLL TOP BUTTON -->
 <a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
  </a>
<!-- END SCROLL TOP BUTTON -->

    <!-- Start Header -->
  <header id="mu-hero">
      <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light mu-navbar">
              <!-- Text based logo -->
              <a class="navbar-brand mu-logo" href="{{url('/')}}"><span>B-HERO</span></a>
              <!-- image based logo -->
                 <!-- <a class="navbar-brand mu-logo" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto mu-navbar-nav">
                <li class="nav-item">
                  <a href="{{url('/')}}">Home</a>
                </li>

                @if(Session::get('UserId'))
                  <li class="nav-item"><a href="{{url('/myarticles')}}">My Articles</a></li>
                  <li class="nav-item"><a href="{{url('/logout')}}">Logout</a></li>
                @else
                  <li class="nav-item"><a href="{{url('/login')}}">Login</a></li>
                  <li class="nav-item"><a href="{{url('/register')}}">Register</a></li>
                @endif
              </ul>
            </div>
          </nav>
      </div>
  </header>
  <!-- End Header -->
