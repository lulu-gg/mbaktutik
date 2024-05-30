@extends('frontend.layout.main')
@section('title', 'Biaya')
@section('content')

    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Biaya</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Biaya</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="cs-height_100 cs-height_lg_70"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="cs-single_post">
                    <h3>1. Pendahuluan</h3>
                    <p>
                        💼 Kebijakan biaya ini menguraikan potongan biaya yang dikenakan kepada penyelenggara
                        event dan pembeli tiket saat menggunakan platform Mbak Tutik. Dengan menggunakan layanan
                        kami, Anda menyetujui kebijakan biaya ini.
                    </p>

                    <h3>2. Potongan Biaya untuk Penyelenggara Event</h3>
                    <p> 📉 Setiap penyelenggara event yang menggunakan platform Mbak Tutik untuk menjual tiket
                        akan dikenakan potongan biaya sebesar 3% dari total penjualan tiket. Potongan ini digunakan
                        untuk mendukung operasional dan pengembangan platform kami.
                    </p>

                    <h3>3. Pajak untuk Pembeli Tiket</h3>
                    <p>
                        💳 Pembeli tiket juga akan dikenakan pajak sesuai dengan platform pembayaran yang dipilih.
                        Pajak ini bervariasi tergantung metode pembayaran yang digunakan dan akan ditampilkan secara
                        jelas pada saat proses pembayaran.
                        <br>
                        Detail Pajak:
                    </p>
                    <ul>
                        <li>Kartu Kredit/Debit: Pajak yang dikenakan sesuai dengan kebijakan penyedia kartu.</li>
                        <li>Transfer Bank: Pajak yang dikenakan sesuai dengan kebijakan bank terkait.</li>
                        <li>E-Wallet: Pajak yang dikenakan sesuai dengan kebijakan penyedia layanan e-wallet.</li>
                    </ul>

                    <h3>4. Transparansi dan Informasi Biaya</h3>
                    <p>🔍 Kami berkomitmen untuk transparan dalam setiap biaya yang dikenakan. Semua biaya dan
                        potongan akan ditampilkan secara jelas pada halaman pembayaran sebelum transaksi
                        diselesaikan. Penyelenggara event dan pembeli tiket akan menerima detail transaksi lengkap
                        melalui email setelah pembayaran berhasil dilakukan.
                    </p>

                    <h3>5. Kebijakan Pengembalian Dana</h3>
                    <p>
                        🚫 Potongan biaya sebesar 3% untuk penyelenggara event tidak akan dikembalikan dalam kasus
                        pembatalan acara. Pajak yang dikenakan kepada pembeli tiket juga tidak dapat dikembalikan
                        kecuali ada kesalahan dari pihak platform atau penyelenggara event.
                    </p>

                    <h3>6. Kontak</h3>
                    <p> 📧 Jika Anda memiliki pertanyaan mengenai kebijakan biaya ini atau mengalami masalah
                        terkait biaya dan pajak, silakan hubungi kami melalui email di mbaktutik@rive.co.id
                        Dengan menggunakan platform Mbak Tutik, Anda menyetujui semua kebijakan biaya yang
                        berlaku. Terima kasih telah memilih kami sebagai mitra penjualan tiket event Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-height_60 cs-height_lg_30"></div>
@endsection
