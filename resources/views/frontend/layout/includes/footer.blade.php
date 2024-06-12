@php

    $generalParameter = \App\Models\GeneralParamter::first();

@endphp

<div class="cs-height_50 cs-height_lg_30"></div>
<footer class="cs-footer cs-style1">
    <div class="cs-footer_bg"></div>
    <div class="cs-height_100 cs-height_lg_60"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="cs-footer_widget">
                    <img src="{{ asset('images/logo-white.png') }}" style="width:200px;" alt="">
                    <div class="mt-4">
                        <h4>Beli Tiket Lebih Mudah</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="cs-footer_widget">
                    <h2 class="cs-widget_title">Tautan</h2>
                    <ul class="cs-widget_nav">
                        <li><a href="{{ url('privacy-and-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('terms-and-conditions') }}">Term & Condition</a></li>
                        <li><a href="{{ url('biaya') }}">Biaya</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="cs-footer_widget">
                    <h2 class="cs-widget_title">Kontak Kami</h2>
                    <ul class="cs-widget_nav">
                        <li>{{ $generalParameter->address }}</li>
                        <li>
                            <a href="mailto:{{ $generalParameter->email }}">{{ $generalParameter->email }}</a>
                        </li>
                        <li>
                            <a href="{!! $generalParameter->whatsapp_url !!}">Whatsapp</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-height_20 cs-height_lg_20"></div>
    <div class="cs-footer_bottom">
        <div class="container">
            <div class="cs-footer_separetor"></div>
            <div class="cs-footer_bottom_in d-flex justify-content-between align-items-center">
                <div class="cs-copyright">Copyright 2024. Mbak Tutik - Development by Punggawa Studio.</div>
                <ul class="cs-footer_menu">
                    <li><a href="{{ url('privacy-and-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('terms-and-conditions') }}">Term & Condition</a></li>
                    <li><a href="{{ url('biaya') }}">Biaya</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>