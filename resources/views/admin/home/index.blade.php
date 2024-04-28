<x-admin.app-layout>
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Welcome back {{ Auth::user()->name }}! 🎉</h5>
                            <p class="mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo eius neque minus
                                ullam, voluptatum reprehenderit quos enim molestiae iusto quas totam beatae commodi quo
                                necessitatibus iste dolor tempore vel a?
                            </p>

                            <a class="btn btn-sm btn-label-primary" href="{{ url('admin/booking-request') }}">Summary</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('sneat-pro/assets/img/illustrations/man-with-laptop-light.png') }}"
                                height="140" alt="View Badge User">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <div class="d-flex justify-content-center bg-primary rounded p-2">
                                        <a href="#"><i
                                                class="bx bx-clipboard text-white"></i></a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span>Lorem Ipsum</span>
                            <h3 class="card-title text-nowrap mb-1 text-primary mt-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <div class="d-flex justify-content-center bg-primary rounded p-2">
                                        <a href="#"><i
                                                class="bx bx-notepad text-white"></i></a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="#">View More</a>
                                    </div>
                                </div>
                            </div>
                            <span>Lorem Ipsum</span>
                            <h3 class="card-title text-nowrap mb-1 text-primary mt-2"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.app-layout>
