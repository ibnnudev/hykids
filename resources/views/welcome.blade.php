@extends('guest.index')
@section('banner')
    <!--Banner Content-->
    <div id="banner-content" class="row clearfix">

        <div class="col-38">

            <div class="section-heading">
                <h1>HYKIDS APPAREL</h1>
                <h2>HyKids adalah pilihan tepat untuk mengekspresikan keceriaan dan kebebasan si kecil.
                    Desain yang beragam, menyenangkan, kualitas yang tak diragukan, dan harga mulai dari 19
                    ribuan.</h2>
            </div>

            <!--Call to Action-->
            <a href="#" class="button">CEK KATALOG</a>
            <!-- <a href="#" class="button">ORDER BY SHOPEE</a>
            <a href="#" class="button">ORDER BY TIKTOK SHOP</a>
            <a href="#" class="button">ORDER BY LAZADA</a> -->
            <!--End Call to Action-->

        </div>


    </div><!--End of Row-->
@endsection
@section('content')
    <!--Introduction-->
    <section id="about" class="introduction scrollto">

        <div class="row clearfix">

            <div class="col-3">
                <div class="section-heading">
                    <h3>PRODUKSI</h3>
                    <h2 class="section-title">Menggunakan Bahan Pilihan Berkualitas</h2>
                    <p class="section-subtitle">HYKIDS mengutamakan bahan berkualitas demi hasil yang luar
                        biasa.
                        Setiap produk kami adalah hasil dari perhatian kami pada detail dan pemilihan material
                        terbaik.</p>
                </div>
            </div>

            <div class="col-2-3">
                <!--Icon Block-->
                <div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.1s">
                    <!--Icon-->
                    <div class="icon">
                        <i class="fa fa-html5 fa-2x"></i>
                    </div>
                    <!--Icon Block Description-->
                    <div class="icon-block-description">
                        <h4>Desain Modern</h4>
                        <p>Setiap desain kami mewakili caleidoskop inspirasi, memastikan bahwa si kecil
                            dapat menemukan sesuatu yang sesuai dengan kepribadiannya.</p>
                    </div>
                </div>
                <!--End of Icon Block-->

                <!--Icon Block-->
                <div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.3s">
                    <!--Icon-->
                    <div class="icon">
                        <i class="fa fa-bolt fa-2x"></i>
                    </div>
                    <!--Icon Block Description-->
                    <div class="icon-block-description">
                        <h4>Cotton Combed 30s</h4>
                        <p>Bahan kaos yang dipilih bukan hanya tentang kehalusan,
                            tapi juga kapasitas penyerapan yang luar biasa. Tidak gerah dan nyaman sepanjang
                            hari.</p>
                    </div>
                </div>
                <!--End of Icon Block-->

                <!--Icon Block-->
                <div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.5s">
                    <!--Icon-->
                    <div class="icon">
                        <i class="fa fa-tablet fa-2x"></i>
                    </div>
                    <!--Icon Block Description-->
                    <div class="icon-block-description">
                        <h4>Sablon DTF</h4>
                        <p>Detail presisi, warna maksimal, teknologi terkini, cetakan tajam, dan desain tahan
                            lama.
                            Sablon juga aman jika kaos dicuci ataupun disetrika.</p>
                    </div>
                </div>
                <!--End of Icon Block-->

                <!--Icon Block-->
                <div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.5s">
                    <!--Icon-->
                    <div class="icon">
                        <i class="fa fa-rocket fa-2x"></i>
                    </div>
                    <!--Icon Block Description-->
                    <div class="icon-block-description">
                        <h4>Jahitan Rapi</h4>
                        <p>Detail jahitan memberikan sentuhan elegan pada setiap produk,
                            menonjolkan keahlian dalam menciptakan pakaian dengan presisi tinggi.</p>
                    </div>
                </div>
                <!--End of Icon Block-->

            </div>

        </div>


    </section>
    <!--End of Introduction-->


    <!--Gallery-->
    <aside id="gallery" class="row text-center scrollto clearfix" data-featherlight-gallery data-featherlight-filter="a">

        <a href="{{ asset('assets/landing/images/gallery-images/gallery-image-1.jpg') }}" data-featherlight="image"
            class="col-3 wow fadeIn" data-wow-delay="0.1s"><img
                src="{{ asset('assets/landing/images/gallery-images/gallery-image-1.jpg') }}" alt="Landing Page" /></a>
        <a href="{{ asset('assets/landing/images/gallery-images/gallery-image-2.jpg') }}" data-featherlight="image"
            class="col-3 wow fadeIn" data-wow-delay="0.3s"><img
                src="{{ asset('assets/landing/images/gallery-images/gallery-image-2.jpg') }}" alt="Landing Page" /></a>
        <a href="{{ asset('assets/landing/images/gallery-images/gallery-image-3.jpg') }}" data-featherlight="image"
            class="col-3 wow fadeIn" data-wow-delay="0.5s"><img
                src="{{ asset('assets/landing/images/gallery-images/gallery-image-3.jpg') }}" alt="Landing Page" /></a>
        <a href="{{ asset('assets/landing/images/gallery-images/gallery-image-4.jpg') }}" data-featherlight="image"
            class="col-3 wow fadeIn" data-wow-delay="1.1s"><img
                src="{{ asset('assets/landing/images/gallery-images/gallery-image-4.jpg') }}" alt="Landing Page" /></a>
        <a href="{{ asset('assets/landing/images/gallery-images/gallery-image-5.jpg') }}" data-featherlight="image"
            class="col-3 wow fadeIn" data-wow-delay="0.9s"><img
                src="{{ asset('assets/landing/images/gallery-images/gallery-image-5.jpg') }}" alt="Landing Page" /></a>
        <a href="{{ asset('assets/landing/images/gallery-images/gallery-image-6.jpg') }}" data-featherlight="image"
            class="col-3 wow fadeIn" data-wow-delay="0.7s"><img
                src="{{ asset('assets/landing/images/gallery-images/gallery-image-6.jpg') }}" alt="Landing Page" /></a>

    </aside>
    <!--End of Gallery-->


    <!--Content Section-->
    <div id="services" class="scrollto clearfix">

        <div class="row no-padding-bottom clearfix">


            <!--Content Left Side-->
            <div class="col-3">
                <!--User Testimonial-->
                <blockquote class="testimonial text-right bigtest">
                    <q>Sesungguhnya manusia terbuat dari tanah</q>
                    <footer>— Vendy Maulana Agusti</footer>
                </blockquote>
                <!-- End of Testimonial-->

            </div>
            <!--End Content Left Side-->

            <!--Content of the Right Side-->
            <div class="col-3">
                <div class="section-heading">
                    <h3>KONSISTEN</h3>
                    <h2 class="section-title">Fokus Pada Kualitas Produk</h2>
                    <p class="section-subtitle">Komitmen HYKIDS terhadap kualitas konsisten menciptakan produk
                        yang diandalkan,
                        memberikan kepuasan pelanggan setiap saat.</p>
                </div>
                <p>Dedikasi terhadap kualitas konsisten tidak hanya tercermin dalam setiap produk yang kami
                    hasilkan,
                    tetapi juga merangkum komitmen mendalam kami untuk memberikan yang terbaik kepada pelanggan.
                    Setiap langkah produksi kami dijalankan dengan ketelitian dan perhatian terhadap detail,
                    sehingga menciptakan produk-produk yang dapat diandalkan.
                </p>
                <p>
                    Kami yakin bahwa setiap produk yang kami tawarkan adalah bukti nyata dari tekad kami
                    untuk memberikan pengalaman belanja yang istimewa.
                </p>
                <!-- Just replace the Video ID "UYJ5IjBRlW8" with the ID of your video on YouTube (Found within the URL) -->
                <a href="#" class="button">
                    Belanja Sekarang
                </a>
            </div>
            <!--End Content Right Side-->

            <div class="col-3">
                <img src="{{ asset('assets/landing/images/dancer.jpg') }}" alt="Dancer" />
            </div>

        </div>


    </div>
    <!--End of Content Section-->

    <!--Testimonials-->
    <aside id="testimonials" class="scrollto text-center" data-enllax-ratio=".2">

        <div class="row clearfix">

            <div class="section-heading">
                <h3>UMPAN BALIK</h3>
                <h2 class="section-title">Apa yang dikatakan pelanggan HYKIDS</h2>
            </div>

            <!--User Testimonial-->
            <blockquote class="col-3 testimonial classic">
                <img src="{{ asset('assets/landing/images/user-images/user-1.jpg') }}" alt="User" />
                <q>Aku suka banget bajunya. Anakku tambah keren dengan harga yang murah tapi berkualitas.
                    Kaosnya tebel dan adem. Bakalan jadi langganan deh.</q>
                <footer class="text-center text-gray-500">Revazeeya - on Shopee</footer>
            </blockquote>
            <!-- End of Testimonial-->

            <!--User Testimonial-->
            <blockquote class="col-3 testimonial classic">
                <img src="{{ asset('assets/landing/images/user-images/user-2.jpg') }}" alt="User" />
                <q>Bagus banget sesuai dengan gambar, ukuran pas untuk anak saya. bahan kaos dan celana nya juga
                    nyaman dipakai</q>
                <footer>Kim J - on Lazada</footer>
            </blockquote>
            <!-- End of Testimonial-->

            <!--User Testimonial-->
            <blockquote class="col-3 testimonial classic">
                <img src="{{ asset('assets/landing/images/user-images/user-3.jpg') }}" alt="User" />
                <q>Realpict nya bagus rekomendasi banget ga kecewa bahan halus nyaman dipake adminnya ramah bgt
                    next order lg thanks you</q>
                <footer>C** - on Tiktok Shop</footer>
            </blockquote>
            <!-- End of Testimonial-->

        </div>

    </aside>
    <!--End of Testimonials-->

    <!--Catalog-->
    <!-- End Catalog-->
@endsection
