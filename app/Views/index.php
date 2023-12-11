<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="hero_area">
    <!-- slider section -->
    <section class="slider_section long_section">
        <div id="customCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="detail-box">
                                    <h1>
                                        Pengalaman Membaca Premium di Perpustakaan Digital Kami
                                    </h1>
                                    <p>
                                        Nikmati kualitas premium buku digital untuk melengkapi momen santai Anda.
                                        Dengan koleksi beragam, kami hadirkan pengalaman membaca yang tak terlupakan.
                                    </p>
                                    <div class="btn-box">
                                        <a href="/product" class="btn1">
                                            Lihat Buku
                                        </a>
                                        <a href="/about" class="btn2">
                                            About
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="img-box">
                                    <img src="<?= base_url('assets/images/slider-img.png'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="detail-box">
                                    <h1>
                                        Terjemahan Bahasa Terbaik untuk Buku Favorit Anda
                                    </h1>
                                    <p>
                                        Dapatkan akses ke terjemahan bahasa terbaik dari koleksi buku terkemuka kami.
                                        Menikmati bacaan favorit dalam bahasa pilihan Anda.
                                    </p>
                                    <div class="btn-box">
                                        <a href="/product" class="btn1">
                                            Lihat Buku
                                        </a>
                                        <a href="/about" class="btn2">
                                            Tentang Kami
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="img-box">
                                    <img src="<?= base_url('assets/images/slider-img.png'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="detail-box">
                                    <h1>
                                        Buku Edukasi Interaktif untuk Anak-anak
                                    </h1>
                                    <p>
                                        Hadirkan pendidikan yang menyenangkan melalui buku digital interaktif
                                        khusus untuk anak-anak. Dukung perkembangan mereka dengan cara yang
                                        menyenangkan.
                                    </p>
                                    <div class="btn-box">
                                        <a href="/product" class="btn1">
                                            Lihat Buku
                                        </a>
                                        <a href="/about" class="btn2">
                                            Tentang Kami
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="img-box">
                                    <img src="<?= base_url('assets/images/slider-img.png'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel" data-slide-to="1"></li>
                <li data-target="#customCarousel" data-slide-to="2"></li>
            </ol>
        </div>
    </section>


    <!-- end slider section -->
</div>

<!-- furniture section -->

<section class="furniture_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Buku Unggulan Kami
            </h2>
        </div>
        <div class="row">

            <?php
            $i = 0;
            foreach ($data as $item):
                if ($i < 3):
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="<?= base_url('covers/'); ?><?= $item['sampul']; ?>" alt="<?= $item['judul']; ?>">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    <?= $item['judul']; ?>
                                </h5>
                                <div class="price_box">
                                    <h6 class="price_heading">
                                        <?php if ($item['status_premium'] == 1): ?>
                                            <span style="color: red;">Premium</span>
                                        <?php endif; ?>
                                        <span>
                                            <br>
                                            <?= $item['pengarang']; ?>
                                        </span>

                                    </h6>
                                    <form action="/read" method="post" class="read-form">
                                        <input type="hidden" name="id_buku" value="<?= $item['id_buku']; ?>">
                                        <button type="submit" class="btn btn-warning" style="background-color: #ff9444;">Baca
                                            Buku</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                endif;
            endforeach;
            ?>





        </div>
    </div>
</section>

<div class="btn-box text-center">
    <a href="/product" class="btn1"
        style="color: white; background-color: #88d4cc; border: 2px solid #88d4cc; padding: 5px 10px;">
        Lebih banyak? ...
    </a>
</div>

</div>

<br><br>



<!-- end furniture section -->



<?= $this->endSection() ?>