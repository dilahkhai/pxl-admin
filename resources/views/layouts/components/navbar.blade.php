<nav class="navbar navbar navbar-expand-lg navbar-light" style="background-color: #FCAEC7;">
    <!-- Container wrapper -->
    <div class="container-fluid mb-4">
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
        <!-- <img class="me-2" src="img/image 1.jpg" alt=""> -->
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
                <!-- <a href="product.html" class="h2 nav-item nav-link">Portfolio</a> -->
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
    <!-- Container wrapper -->
</nav>
