<!-- Begin::Footer -->
@props([
    'contact' => null,
])
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        @if (!$contact)
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor.
                    Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
        @else
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
            <p class="mb-4">{{ $contact->slogan_footer }}</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>{{ $contact->full_address }}</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{ $contact->email }}</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>{{ $contact->phone }}</p>
        </div>
        @endif
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5 d-lg-block d-none">
                    <!--blank column-->
                </div>
                <div class="col-md-4 mb-5 d-lg-block d-none">
                    <!--blank column-->
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                    <p>Ikuti Berita Produk Terbaru Kami & Promosi</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Alamat Email">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text-primary" href="#">{{ request()->getHttpHost() }}</a>. All Rights Reserved.
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="{{ asset('vendor/front/img/payments.png') }}" alt="">
        </div>
    </div>
</div>
<!-- End::Footer -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
