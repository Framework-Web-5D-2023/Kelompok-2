<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <h1><?= $title; ?></h1>
    <?php if (session()->has('validation_errors')) : ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach (session('validation_errors') as $error) : ?>
                <?= esc($error) ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<form action="<?= base_url("/create")?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Inputkan Nama..." value="">
    </div>
    <div class="mb-3">
        <label for="pengarang" class="form-label">pengarang</label>
        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Inputkan pengarang..." value="">
    </div>
    <div class="mb-3">
        <label for="penerbit" class="form-label">penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Inputkan penerbit..." value="">
    </div>
    <div class="mb-3">
        <label for="tahun_terbit" class="form-label">tahun_terbit</label>
        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Inputkan tahun_terbit..." value="">
    </div>
    <div class="mb-3">
        <label for="sinopsis" class="form-label">sinopsis</label>
        <input type="text" class="form-control" id="sinopsis" name="sinopsis" placeholder="Inputkan sinopsis..." value="">
    </div>
    <div class="mb-3">
        <label for="path" class="form-label">path</label>
        <input type="text" class="form-control" id="path" name="path" placeholder="Inputkan path..." value="">
    </div>
    <div class="mb-3">
        <label for="status_premium" class="form-label">status_premium</label>
        <input type="text" class="form-control" id="status_premium" name="status_premium" placeholder="Inputkan status_premium..." value="">
    </div>
    <div class="col-sm-12 mb-3">
        <div class="form-group">
            <label for="sampul">Image</label>
            <input type="file" class="form-control" id="sampul" name="sampul">
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </form>
    <?= $this->endSection() ?>