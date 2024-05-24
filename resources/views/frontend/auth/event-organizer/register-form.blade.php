@extends('frontend.layout.main')
@section('title', 'Register Event Organizer')
@section('content')
    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Register Event Organizer</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Register</li>
                    <li class="breadcrumb-item active">Event Organizer</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="cs-height_100 cs-height_lg_70"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-8 offset-xl-3 offset-md-2">
                <form class="cs-form_card cs-style1 cs-box_shadow cs-white_bg" method="POST"
                    action="{{ url()->current() . '/submit' }}" enctype="multipart/form-data">
                    @csrf
                    <div class="cs-form_card_in">
                        <h2 class="cs-form_title text-center">Become an Event Organizer</h2>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                        <div class="cs-file_wrap">
                            <div class="cs-file_in">
                                <svg width="46" height="47" viewBox="0 0 46 47" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M44.125 36.5H39.25V31.625C39.25 31.194 39.0788 30.7807 38.774 30.476C38.4693 30.1712 38.056 30 37.625 30C37.194 30 36.7807 30.1712 36.476 30.476C36.1712 30.7807 36 31.194 36 31.625V36.5H31.125C30.694 36.5 30.2807 36.6712 29.976 36.976C29.6712 37.2807 29.5 37.694 29.5 38.125C29.5 38.556 29.6712 38.9693 29.976 39.274C30.2807 39.5788 30.694 39.75 31.125 39.75H36V44.625C36 45.056 36.1712 45.4693 36.476 45.774C36.7807 46.0788 37.194 46.25 37.625 46.25C38.056 46.25 38.4693 46.0788 38.774 45.774C39.0788 45.4693 39.25 45.056 39.25 44.625V39.75H44.125C44.556 39.75 44.9693 39.5788 45.274 39.274C45.5788 38.9693 45.75 38.556 45.75 38.125C45.75 37.694 45.5788 37.2807 45.274 36.976C44.9693 36.6712 44.556 36.5 44.125 36.5Z"
                                        fill="#737A99" />
                                    <path
                                        d="M24.625 36.5H5.125C4.69402 36.5 4.2807 36.3288 3.97595 36.024C3.67121 35.7193 3.5 35.306 3.5 34.875V5.625C3.5 5.19402 3.67121 4.7807 3.97595 4.47595C4.2807 4.17121 4.69402 4 5.125 4H34.375C34.806 4 35.2193 4.17121 35.524 4.47595C35.8288 4.7807 36 5.19402 36 5.625V25.125C36 25.556 36.1712 25.9693 36.476 26.274C36.7807 26.5788 37.194 26.75 37.625 26.75C38.056 26.75 38.4693 26.5788 38.774 26.274C39.0788 25.9693 39.25 25.556 39.25 25.125V5.625C39.25 4.33207 38.7364 3.09209 37.8221 2.17785C36.9079 1.26361 35.6679 0.75 34.375 0.75H5.125C3.83207 0.75 2.59209 1.26361 1.67785 2.17785C0.763615 3.09209 0.25 4.33207 0.25 5.625V34.875C0.25 36.1679 0.763615 37.4079 1.67785 38.3221C2.59209 39.2364 3.83207 39.75 5.125 39.75H24.625C25.056 39.75 25.4693 39.5788 25.774 39.274C26.0788 38.9693 26.25 38.556 26.25 38.125C26.25 37.694 26.0788 37.2807 25.774 36.976C25.4693 36.6712 25.056 36.5 24.625 36.5Z"
                                        fill="#737A99" />
                                    <path
                                        d="M14.875 15.375C17.1187 15.375 18.9375 13.5562 18.9375 11.3125C18.9375 9.06884 17.1187 7.25 14.875 7.25C12.6313 7.25 10.8125 9.06884 10.8125 11.3125C10.8125 13.5562 12.6313 15.375 14.875 15.375Z"
                                        fill="#737A99" />
                                    <path
                                        d="M8.84625 20.7209L6.75 22.8334V33.2497H32.75V22.8334L25.7787 15.8459C25.6277 15.6936 25.448 15.5727 25.2499 15.4902C25.0519 15.4077 24.8395 15.3652 24.625 15.3652C24.4105 15.3652 24.1981 15.4077 24.0001 15.4902C23.802 15.5727 23.6223 15.6936 23.4713 15.8459L14.875 24.4584L11.1537 20.7209C11.0027 20.5686 10.823 20.4477 10.6249 20.3652C10.4269 20.2827 10.2145 20.2402 10 20.2402C9.78548 20.2402 9.57308 20.2827 9.37506 20.3652C9.17704 20.4477 8.99731 20.5686 8.84625 20.7209Z"
                                        fill="#737A99" />
                                </svg>
                                <h3>Drag and drop an image</h3>
                                <p>Chose your logo (png)</p>
                            </div>
                            <div class="cs-close_file" title="Close">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.421875" y="0.163086" width="32" height="32" rx="16"
                                        fill="url(#paint0_linear_1353_4256)" />
                                    <path
                                        d="M22.129 11.8702C22.5195 11.4797 22.5195 10.8465 22.129 10.456C21.7385 10.0655 21.1053 10.0655 20.7148 10.456L22.129 11.8702ZM10.7148 20.456C10.3242 20.8465 10.3242 21.4797 10.7148 21.8702C11.1053 22.2607 11.7385 22.2607 12.129 21.8702L10.7148 20.456ZM12.129 10.456C11.7385 10.0655 11.1053 10.0655 10.7148 10.456C10.3242 10.8465 10.3242 11.4797 10.7148 11.8702L12.129 10.456ZM20.7148 21.8702C21.1053 22.2607 21.7385 22.2607 22.129 21.8702C22.5195 21.4797 22.5195 20.8465 22.129 20.456L20.7148 21.8702ZM20.7148 10.456L10.7148 20.456L12.129 21.8702L22.129 11.8702L20.7148 10.456ZM10.7148 11.8702L20.7148 21.8702L22.129 20.456L12.129 10.456L10.7148 11.8702Z"
                                        fill="white" />
                                    <defs>
                                        <linearGradient id="paint0_linear_1353_4256" x1="0.421875" y1="0.163086"
                                            x2="38.7886" y2="19.5877" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#FC466B" />
                                            <stop offset="1" stop-color="#3F5EFB" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <input type="file" class="cs-file" accept="image/png" name="logo" required>
                            <img src="https://thememarch.com/" class="cs-preview" alt="Image">
                        </div>
                        @error('logo')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <div class="cs-height_30 cs-height_lg_30"></div>
                        <div class="cs-form_field_wrap">
                            <input type="text" class="cs-form_field @error('company_name') is-invalid @enderror"
                                placeholder="Organizer Name" name="company_name" value="{{ old('company_name') }}" required>
                            @error('company_name')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                        <div class="cs-form_field_wrap">
                            <textarea cols="30" rows="3" placeholder="About Us" class="cs-form_field @error('about_us') is-invalid @enderror"
                                name="about_us" required>{{ old('about_us') }}</textarea>
                            @error('about_us')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                        <div class="cs-form_field_wrap">
                            <input type="text" class="cs-form_field @error('username') is-invalid @enderror" placeholder="Username"
                                name="username" value="{{ old('username') }}" required>
                            @error('username')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="cs-form_field_wrap">
                            <input type="email" class="cs-form_field @error('email') is-invalid @enderror" placeholder="Email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="cs-form_field_wrap">
                            <input type="password" class="cs-form_field @error('password') is-invalid @enderror" placeholder="Password"
                                name="password" value="{{ old('password') }}" required>
                            @error('password')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="cs-form_field_wrap">
                            <input type="number" class="cs-form_field @error('phone') is-invalid @enderror" placeholder="Phone"
                                name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="cs-form_field_wrap">
                            <input type="text" class="cs-form_field @error('province') is-invalid @enderror"
                                placeholder="Province" name="province" value="{{ old('province') }}" required>
                            @error('province')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="cs-form_field_wrap">
                            <input type="text" class="cs-form_field @error('city') is-invalid @enderror" placeholder="City"
                                name="city" value="{{ old('city') }}" required>
                            @error('city')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="cs-form_field_wrap">
                            <input type="text" class="cs-form_field @error('zip') is-invalid @enderror" placeholder="Zip Code"
                                name="zip" value="{{ old('zip') }}" required>
                            @error('zip')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="cs-form_field_wrap">
                            <textarea cols="30" rows="3" placeholder="Address" class="cs-form_field @error('address') is-invalid @enderror"
                                name="address" required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="cs-file_wrap">
                            <div class="cs-file_in">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" width="46" height="46" viewBox="0 0 256 256"
                                    xml:space="preserve">

                                    <defs>
                                    </defs>
                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                        transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                        <path
                                            d="M 86.554 26.164 v 58.519 c 0 2.937 -2.381 5.317 -5.317 5.317 H 22.076 c -2.937 0 -5.317 -2.381 -5.317 -5.317 V 71.549 V 5.317 C 16.759 2.381 19.139 0 22.076 0 h 38.315 C 68.66 0.135 86.554 16.011 86.554 26.164 z"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(226,226,226); fill-rule: nonzero; opacity: 1;"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path
                                            d="M 16.833 21.859 H 57.1 c 3.218 0 5.827 2.609 5.827 5.827 v 18.341 c 0 3.218 -2.609 5.827 -5.827 5.827 H 9.273 c -3.218 0 -5.827 -2.609 -5.827 -5.827 V 16.032"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(241,86,66); fill-rule: nonzero; opacity: 1;"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path
                                            d="M 3.446 16.032 c 0 3.218 2.609 5.827 5.827 5.827 h 7.56 V 10.552 h -7.56 c -3.218 0 -5.827 2.609 -5.827 5.827"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(190,64,48); fill-rule: nonzero; opacity: 1;"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path
                                            d="M 60.391 0 h 6.662 c 2.826 0 5.536 1.123 7.534 3.121 l 8.847 8.847 c 1.998 1.998 3.121 4.708 3.121 7.534 v 6.662 c 0 -3.419 -2.772 -6.19 -6.19 -6.19 h -7.866 c -3.268 0 -5.917 -2.649 -5.917 -5.917 c 0 0 0 -7.866 0 -7.866 v 0 C 66.581 2.772 63.81 0 60.391 0 C 60.391 0 60.391 0 60.391 0 z"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(183,183,183); fill-rule: nonzero; opacity: 1;"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path
                                            d="M 20.708 27.68 h -5.489 c -0.829 0 -1.5 0.671 -1.5 1.5 v 9.1 v 6.231 c 0 0.829 0.671 1.5 1.5 1.5 s 1.5 -0.671 1.5 -1.5 V 39.78 h 3.989 c 2.272 0 4.122 -1.849 4.122 -4.121 v -3.858 C 24.829 29.529 22.98 27.68 20.708 27.68 z M 21.829 35.659 c 0 0.618 -0.503 1.121 -1.122 1.121 h -3.989 v -6.1 h 3.989 c 0.619 0 1.122 0.503 1.122 1.121 V 35.659 z"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path
                                            d="M 34.554 27.68 h -5.22 c -0.829 0 -1.5 0.671 -1.5 1.5 v 15.332 c 0 0.829 0.671 1.5 1.5 1.5 h 5.22 c 2.421 0 4.391 -1.97 4.391 -4.391 v -9.55 C 38.945 29.65 36.976 27.68 34.554 27.68 z M 35.945 41.621 c 0 0.767 -0.624 1.391 -1.391 1.391 h -3.72 V 30.68 h 3.72 c 0.767 0 1.391 0.624 1.391 1.391 V 41.621 z"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path
                                            d="M 51.841 27.68 h -8.11 c -0.829 0 -1.5 0.671 -1.5 1.5 v 15.332 c 0 0.829 0.671 1.5 1.5 1.5 s 1.5 -0.671 1.5 -1.5 v -6.166 h 3.812 c 0.828 0 1.5 -0.671 1.5 -1.5 s -0.672 -1.5 -1.5 -1.5 H 45.23 V 30.68 h 6.61 c 0.828 0 1.5 -0.671 1.5 -1.5 S 52.669 27.68 51.841 27.68 z"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path
                                            d="M 45.142 69.824 c -0.587 0.586 -1.536 0.586 -2.122 0 l -5.248 -5.248 v 15.642 c 0 0.828 -0.671 1.5 -1.5 1.5 s -1.5 -0.672 -1.5 -1.5 V 64.576 l -5.248 5.248 c -0.586 0.586 -1.535 0.586 -2.121 0 s -0.586 -1.535 0 -2.121 l 6.323 -6.323 c 0.625 -0.625 1.424 -0.955 2.243 -1.024 c 0.098 -0.02 0.2 -0.031 0.304 -0.031 s 0.206 0.011 0.304 0.031 c 0.818 0.069 1.618 0.399 2.243 1.024 l 6.323 6.323 C 45.727 68.289 45.727 69.238 45.142 69.824 z"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(183,183,183); fill-rule: nonzero; opacity: 1;"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    </g>
                                </svg>
                                <h3>Drag and drop an PDF file</h3>
                                <p>Upload your proposal</p>
                            </div>
                            <div class="cs-close_file" title="Close">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.421875" y="0.163086" width="32" height="32" rx="16"
                                        fill="url(#paint0_linear_1353_42567)" />
                                    <path
                                        d="M22.129 11.8702C22.5195 11.4797 22.5195 10.8465 22.129 10.456C21.7385 10.0655 21.1053 10.0655 20.7148 10.456L22.129 11.8702ZM10.7148 20.456C10.3242 20.8465 10.3242 21.4797 10.7148 21.8702C11.1053 22.2607 11.7385 22.2607 12.129 21.8702L10.7148 20.456ZM12.129 10.456C11.7385 10.0655 11.1053 10.0655 10.7148 10.456C10.3242 10.8465 10.3242 11.4797 10.7148 11.8702L12.129 10.456ZM20.7148 21.8702C21.1053 22.2607 21.7385 22.2607 22.129 21.8702C22.5195 21.4797 22.5195 20.8465 22.129 20.456L20.7148 21.8702ZM20.7148 10.456L10.7148 20.456L12.129 21.8702L22.129 11.8702L20.7148 10.456ZM10.7148 11.8702L20.7148 21.8702L22.129 20.456L12.129 10.456L10.7148 11.8702Z"
                                        fill="white" />
                                    <defs>
                                        <linearGradient id="paint0_linear_1353_42567" x1="0.421875" y1="0.163086"
                                            x2="38.7886" y2="19.5877" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#FC466B" />
                                            <stop offset="1" stop-color="#3F5EFB" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <input type="file" class="cs-file" accept=".pdf" name="proposal" required>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="cs-preview"
                                version="1.1" width="46" height="46" viewBox="0 0 256 256"
                                xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                    transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                    <path
                                        d="M 86.554 26.164 v 58.519 c 0 2.937 -2.381 5.317 -5.317 5.317 H 22.076 c -2.937 0 -5.317 -2.381 -5.317 -5.317 V 71.549 V 5.317 C 16.759 2.381 19.139 0 22.076 0 h 38.315 C 68.66 0.135 86.554 16.011 86.554 26.164 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(226,226,226); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path
                                        d="M 16.833 21.859 H 57.1 c 3.218 0 5.827 2.609 5.827 5.827 v 18.341 c 0 3.218 -2.609 5.827 -5.827 5.827 H 9.273 c -3.218 0 -5.827 -2.609 -5.827 -5.827 V 16.032"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(241,86,66); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path
                                        d="M 3.446 16.032 c 0 3.218 2.609 5.827 5.827 5.827 h 7.56 V 10.552 h -7.56 c -3.218 0 -5.827 2.609 -5.827 5.827"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(190,64,48); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path
                                        d="M 60.391 0 h 6.662 c 2.826 0 5.536 1.123 7.534 3.121 l 8.847 8.847 c 1.998 1.998 3.121 4.708 3.121 7.534 v 6.662 c 0 -3.419 -2.772 -6.19 -6.19 -6.19 h -7.866 c -3.268 0 -5.917 -2.649 -5.917 -5.917 c 0 0 0 -7.866 0 -7.866 v 0 C 66.581 2.772 63.81 0 60.391 0 C 60.391 0 60.391 0 60.391 0 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(183,183,183); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path
                                        d="M 20.708 27.68 h -5.489 c -0.829 0 -1.5 0.671 -1.5 1.5 v 9.1 v 6.231 c 0 0.829 0.671 1.5 1.5 1.5 s 1.5 -0.671 1.5 -1.5 V 39.78 h 3.989 c 2.272 0 4.122 -1.849 4.122 -4.121 v -3.858 C 24.829 29.529 22.98 27.68 20.708 27.68 z M 21.829 35.659 c 0 0.618 -0.503 1.121 -1.122 1.121 h -3.989 v -6.1 h 3.989 c 0.619 0 1.122 0.503 1.122 1.121 V 35.659 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path
                                        d="M 34.554 27.68 h -5.22 c -0.829 0 -1.5 0.671 -1.5 1.5 v 15.332 c 0 0.829 0.671 1.5 1.5 1.5 h 5.22 c 2.421 0 4.391 -1.97 4.391 -4.391 v -9.55 C 38.945 29.65 36.976 27.68 34.554 27.68 z M 35.945 41.621 c 0 0.767 -0.624 1.391 -1.391 1.391 h -3.72 V 30.68 h 3.72 c 0.767 0 1.391 0.624 1.391 1.391 V 41.621 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path
                                        d="M 51.841 27.68 h -8.11 c -0.829 0 -1.5 0.671 -1.5 1.5 v 15.332 c 0 0.829 0.671 1.5 1.5 1.5 s 1.5 -0.671 1.5 -1.5 v -6.166 h 3.812 c 0.828 0 1.5 -0.671 1.5 -1.5 s -0.672 -1.5 -1.5 -1.5 H 45.23 V 30.68 h 6.61 c 0.828 0 1.5 -0.671 1.5 -1.5 S 52.669 27.68 51.841 27.68 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path
                                        d="M 45.142 69.824 c -0.587 0.586 -1.536 0.586 -2.122 0 l -5.248 -5.248 v 15.642 c 0 0.828 -0.671 1.5 -1.5 1.5 s -1.5 -0.672 -1.5 -1.5 V 64.576 l -5.248 5.248 c -0.586 0.586 -1.535 0.586 -2.121 0 s -0.586 -1.535 0 -2.121 l 6.323 -6.323 c 0.625 -0.625 1.424 -0.955 2.243 -1.024 c 0.098 -0.02 0.2 -0.031 0.304 -0.031 s 0.206 0.011 0.304 0.031 c 0.818 0.069 1.618 0.399 2.243 1.024 l 6.323 6.323 C 45.727 68.289 45.727 69.238 45.142 69.824 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(183,183,183); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        @error('logo')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <button class="cs-btn cs-style1 cs-btn_lg w-100">
                            <span>Register Now</span>
                        </button>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                        <div class="cs-form_footer text-center">Have an account? <a href="{{ url('/dashboard/login') }}">Log
                                In</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="cs-height_100 cs-height_lg_70"></div>
@endsection
