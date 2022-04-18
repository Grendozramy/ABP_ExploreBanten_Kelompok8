<!-- Footer Start -->
<div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 75px;">
    <div class="container pt-3">
        <div class="row g-5 pt-4">
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">EXPLORE BANTEN</h3>
                <div class="d-flex flex-column justify-content-start">
                    <h6 class="text-white">EXPLORE BANTEN started in May
                        2022 to introduce different colors
                        for traveling addicts.</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ps-5">
                <h3 class="text-white mb-4">Categories</h3>
                @foreach ($categoryf as $item)
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="{{ url('/tours', $item->slug) }}"><i class="bi bi-arrow-right text-primary me-2"></i>{{ $item->name }}</a>
                </div>
                @endforeach
                <a class="text-light mb-2" href="{{ url('/maps') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Maps</a>
                
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Contact Us</h3>
                <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>42394 Banten</p>
                <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>FarhanGeming@example.com
                </p>
                <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Follow Us</h3>
                <div class="d-flex">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="https://web.facebook.com/infolebakbanten"><i
                            class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href="https://www.instagram.com/explorebanten/"><i
                            class="fab fa-instagram fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-light py-4" style="background: #051225;">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-md-0">&copy; <a class="text-white border-bottom" href="#">Explore Banten</a>.
                    All
                    Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>