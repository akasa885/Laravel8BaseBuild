 <!-- Begin::Navbar -->
 <div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="/" class="text-decoration-none d-block d-lg-none">
                    <img src="{{ asset('logo/upq_logo_nobg.png') }}" alt="Logo" height="40">
                    {{-- <span class="h1 text-uppercase text-dark bg-light px-2">Rane</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Savoir</span> --}}
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/" class="nav-item nav-link @if(count(Request::segments()) == 0) active @endif">Home</a>
                        <a href="{{ route('front.contact.index') }}" class="nav-item nav-link @if(Request::routeIs('front.contact.index')) active @endif">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        {{-- <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a> --}}
                        <x-front.cart-counter part="navbar" />
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End::Navbar -->