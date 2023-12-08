<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="hero_area">

  <!-- about section -->

  <section class="about_section layout_padding long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="assets/images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              Selamat datang di Perpustakaan Digital kami, tempat terbaik untuk menemukan pengalaman
              membaca yang tak terlupakan. Kami bangga menyajikan koleksi buku digital premium dan gratis
              untuk memenuhi kebutuhan pembaca dari berbagai kalangan.
            </p>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>