<!-- <nav class="navbar navbar navbar-expand-lg navbar-light" style="background-color: #FCAEC7;">
    <div class="container-fluid mb-4">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
        <h3>PxL Property</h3>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="h2 nav-item nav-link">Home</a>
                <a href="about.html" class="h2 nav-item nav-link">About Us</a>
                <a href="values.html" class="h2 nav-item nav-link active">Our Values</a>
                <a href="#contact-us" class="h2 nav-item nav-link hidden-on-mobile">Contact</a>
                @auth
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        {{ Auth::user()->name }}
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</nav> -->

<nav class="navbar navbar-expand-lg bg-light sticky-top navbar-light">
  <div class="container">
    <a class="navbar-brand" href="#"
      ><img
        id="MDB-logo"
        src="https://mdbcdn.b-cdn.net/wp-content/uploads/2018/06/logo-mdb-jquery-small.png"
        alt="MDB Logo"
        draggable="false"
        height="30"
    /></a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link mx-2" href="#!"><i class="fas fa-plus-circle pe-2"></i>Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="#!"><i class="fas fa-bell pe-2"></i>Alerts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="#!"><i class="fas fa-heart pe-2"></i>Trips</a>
        </li>
        @auth
        <li class="nav-item ms-3">
            <!-- <form action="" method="POST"></form> -->
          <a class="btn btn-black btn-rounded" href="{{ route('logout') }}">{{ Auth::user()->name }}</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<script>
  $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });
</script>