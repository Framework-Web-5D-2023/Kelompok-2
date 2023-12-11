<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="furniture_section layout_padding">
<?php if (session()->has('nonpremium')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Kamu Belum Premium</strong> Untuk membaca buku yang kamu pilih, silahkan beli membership
        </div>
    <?php endif; ?>
<?php if (session()->has('failed')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Transaksi Gagal dibuat</strong> Anda masih memiliki transaksi tertunda
        </div>
    <?php endif; ?>
    <?php if (session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Transaksi Berhasil dibuat</strong> tunggu maksimal 1x24 jam hingga admin mengkonfirmasi
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="detail-box">
                        <h5>Paket Membership Life Time</h5>
                        <div class="price_box">
                            <h6 class="price_heading">
                                <span>Rp400.000</span>
                            </h6>
                            <form action="/belimembership" method="post">
                                <input type="hidden" name="id_membership" value="1">
                                <button type="submit" class="btn btn-warning" style="background-color: #ff9444;">Beli Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- "Lihat Transaksi" button centered horizontally -->
<div class="text-center mt-4">
    <a href="/transaksi" class="btn btn-primary" style="background-color: #70b4bc;">Lihat Transaksi</a>
    <br>
    <br>
</div>

<?= $this->endSection() ?>
