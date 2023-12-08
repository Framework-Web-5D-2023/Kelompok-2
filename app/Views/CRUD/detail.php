<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
  <div class="container">
    <h1><?= $title; ?></h1>
    <div class="mt-5">
    <h3 style="width:200px;" class="d-inline-block">Judul</h3>
    <span class="d-inline-block mx-3">:</span>
    <h3 class="d-inline-block"><?= $buku["judul"]; ?></h3>
</div>

<div class="mt-5">
    <h3 style="width:200px;" class="d-inline-block">Pengarang</h3>
    <span class="d-inline-block mx-3">:</span>
    <h3 class="d-inline-block"><?= $buku["pengarang"]; ?></h3>
</div>

<div class="mt-5">
    <h3 style="width:200px;" class="d-inline-block">Penerbit</h3>
    <span class="d-inline-block mx-3">:</span>
    <h3 class="d-inline-block"><?= $buku["penerbit"]; ?></h3>
</div>

<div class="mt-5">
    <h3 style="width:200px;" class="d-inline-block">Tahun Terbit</h3>
    <span class="d-inline-block mx-3">:</span>
    <h3 class="d-inline-block"><?= $buku["tahun_terbit"]; ?></h3>
</div>

<div class="mt-5">
    <h3 style="width:200px;" class="d-inline-block">Sinopsis</h3>
    <span class="d-inline-block mx-3">:</span>
    <h3 class="d-inline-block"><?= $buku["sinopsis"]; ?></h3>
</div>

<div class="mt-5">
    <h3 style="width:200px;" class="d-inline-block">Path</h3>
    <span class="d-inline-block mx-3">:</span>
    <h3 class="d-inline-block"><?= $buku["path"]; ?></h3>
</div>

<div class="mt-5">
    <h3 style="width:200px;" class="d-inline-block">Status Premium</h3>
    <span class="d-inline-block mx-3">:</span>
    <h3 class="d-inline-block"><?= $buku["status_premium"]; ?></h3>
</div>

<div class="mt-5">
    <h3 style="width:200px;" class="d-inline-block">Sampul</h3>
    <span class="d-inline-block mx-3">:</span>
    <h3 class="d-inline-block"><?= $buku["sampul"]; ?></h3>
</div>

  </div>
</div>
<?= $this->endSection(); ?>