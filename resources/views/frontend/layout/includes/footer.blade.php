<!-- footer -->
<section class="">
    <footer class="footer-ats text-white">
        <div class="container py-3 mx-auto">
            <div class="row">
                <div class="col-md-4 col-lg-5 col-xl-5 mt-3 ftrats">
                    <img src="{{ asset('frontend/assets/img/Logo.svg') }}" alt="Logo" height="32px"
                        class="d-inline-block align-text-top mb-3" />
                    <h5 class="mb-3">
                        PT. Linus Trans Teknologi
                    </h5>
                    <p class="ftrdesc">
                        Visualize and digitalize container shipping in Indonesia
                    </p>
                </div>
                <div class="col-md-4 col-lg-2 col-xl-2 mt-3 ftrats ps-md-5">
                    <h6 class="mb-4 font-weight-bold">
                        Navigasi
                    </h6>
                    <p>
                        <a class="text-white text-decoration-none" href="{{ url('/') }}">Beranda</a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none" href="{{ url('/service') }}">Layanan</a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none" href="{{ url('/about-us') }}">Tentang Kami</a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none" href="{{ url('/privacy-policy') }}">Kebijakan
                            Privasi</a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none" href="{{ url('/return-refund-policy') }}">Kebijakan
                            Return & Refund</a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none" href="{{ url('/term-condition') }}">Syarat &
                            Ketentuan</a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none" href="{{ url('/manual-customer') }}">
                            Manual Customer
                        </a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none" href="{{ url('/manual-flow-transaction') }}">
                            Manual Transaction
                        </a>
                    </p>
                </div>
                <div class="col-md-4 col-lg-5  col-xl-5 mt-3 ftrats">
                    <h6 class="mb-4 font-weight-bold">Temukan Kami</h6>
                    <p><i class="bi bi-geo-alt-fill me-2"></i>{{ $about->address_1_location }}</p>
                    <p><i class="bi bi-geo-alt-fill me-2"></i>{{ $about->address_2_location }}</p>
                    <p><i class="bi bi-telephone-fill me-2"></i></i>{{ $about->phone }}</p>
                    <p><i class="bi bi-whatsapp me-2"></i></i>{{ $about->mobile_phone }}</p>
                </div>
            </div>
        </div>
        <div class="footer-bwh text-start py-3">
            <div class="container mx-auto">
                <div class="row">
                    <div class="col-12 col-lg-9 col-md-8 align-self-center text-center text-md-start">
                        ©2024 Rive. All rights reserved.
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 text-center text-md-end">

                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>
<!-- end of footer -->
