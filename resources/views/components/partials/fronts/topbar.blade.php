<!-- Begin::Topbar -->
<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="{{ route('front.contact.index') }}">Contact</a>
                <a class="text-body mr-3" href="#">Help</a>
                <a class="text-body mr-3" href="#">FAQs</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                @auth('admin')
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                            data-bs-toggle="dropdown">Hi, Admin <strong>{{ Auth::guard('admin')->user()->username }}</strong></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" onclick="window.location={{ '`' . route('admin.home') . '`' }}"
                                type="button">Dashboard</button>
                            <button class="dropdown-item" onclick="document.getElementById('logout-form-admin').submit();"
                                type="button">Sign out</button>
                        </div>
                        <form id="logout-form-admin" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endauth
                @guest
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">My
                            Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" onclick="window.location={{ '`' . route('login') . '`' }}"
                                type="button">Sign in</button>
                            <button class="dropdown-item" onclick="window.location={{ '`' . route('register') . '`' }}"
                                type="button">Sign up</button>
                        </div>
                    </div>
                @else
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">Hello,
                            {{ Auth::user()->name }}</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" onclick="window.location={{ '`' . route('user.home') . '`' }}"
                                type="button">My Dashboard</button>
                            <button class="dropdown-item" onclick="document.getElementById('logout-form').submit();"
                                type="button">Sign out</button>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                        data-bs-toggle="dropdown">EN</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">ID</button>
                    </div>
                </div>
            </div>
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                {{-- <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle"
                        style="padding-bottom: 2px;">0</span>
                </a> --}}
                <x-front.cart-counter part="topbar" />
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="/" class="text-decoration-none">
                <img src="{{ asset('logo/upq_logo_nobg.png') }}" alt="Logo" height="60">
                {{-- <span class="h1 text-uppercase text-primary bg-dark px-2">Rane</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Savoir</span> --}}
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            {{-- <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form> --}}
            <!--blank column-->
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">System Support</p>
            <h5 class="m-0">+62 8533-4727-663</h5>
        </div>
    </div>
</div>
<!-- End::Topbar -->
