<header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
    <div id="header" class="nav-collapse">
        <div class="row clearfix">
            <div class="col-1">

                <!--Logo-->
                <div id="logo">

                    <!--Logo that is shown on the banner-->
                    <img src="{{ asset('assets/landing/images/logo.png') }}" id="banner-logo" alt="Landing Page" />
                    <!--End of Banner Logo-->

                    <!--The Logo that is shown on the sticky Navigation Bar-->
                    <img src="{{ asset('assets/landing/images/logo-2.png') }}" id="navigation-logo"
                        alt="Landing Page" />
                    <!--End of Navigation Logo-->

                </div>
                <!--End of Logo-->

                <aside>

                    <!--Social Icons in Header-->
                    <ul class="social-icons">
                        <li>
                            <a href="https://www.instagram.com/hykids.apparel/" class="image-button">
                                <img src="{{ asset('assets/landing/images/instagram.png') }}" alt="Gambar Button">
                            </a>
                        <li>
                            <a href="https://shopee.co.id/gudang77jember" class="image-button">
                                <img src="{{ asset('assets/landing/images/shopee.png') }}" alt="Gambar Button">
                            </a>
                        <li>
                            <a href="https://www.tiktok.com/@distroanaku" class="image-button">
                                <img src="{{ asset('assets/landing/images/tiktok.png') }}" alt="Gambar Button">
                            </a>
                        <li>
                            <a href="https://www.lazada.co.id/shop/distro-anak77/" class="image-button">
                                <img src="{{ asset('assets/landing/images/lazada.png') }}" alt="Gambar Button">
                            </a>
                        </li>
                        </li>
                        </li>
                        </li>
                    </ul>
                    <!--End of Social Icons in Header-->

                </aside>

                <!--Main Navigation-->
                <nav id="nav-main">
                    <ul>
                        <li>
                            <a href="/#banner">Beranda</a>
                        </li>
                        <li>
                            <a href="/#about">Tentang Hykids</a>
                        </li>
                        <li>
                            <a href="/#gallery">Galeri</a>
                        </li>
                        <li>
                            <a href="/#services">Fokus</a>
                        </li>
                        <li>
                            <a href="/#testimonials">Testimoni</a>
                        </li>
                        <li>
                            <a href="{{ route('user.catalog.index') }}" class="">Katalog</a>
                        </li>
                    </ul>
                </nav>
                <!--End of Main Navigation-->

                <div id="nav-trigger"><span></span></div>
                <nav id="nav-mobile"></nav>

            </div>
        </div>
    </div><!--End of Header-->

    @yield('banner')
</header>
