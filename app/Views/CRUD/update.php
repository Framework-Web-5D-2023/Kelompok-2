<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h1><?= $title; ?></h1>
<form action="<?= base_url("/updateBook/update/") . $book["id_buku"] ?>" method="post">
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Inputkan Nama..." value="<?= $book["judul"]; ?>">
        <!-- <input type="text" class="form-control <a?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Inputkan Nama..." value="<a?= $mahasiswa["nama"]; ?>"> -->
        <!-- <div class="invalid-feedback">
            <a?= validation_show_error('nama'); ?>
        </div> -->
    </div>
    <div class="mb-3">
        <label for="pengarang" class="form-label">pengarang</label>
        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Inputkan pengarang..." value="<?= $book["pengarang"]; ?>">
    </div>
    <div class="mb-3">
        <label for="penerbit" class="form-label">penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Inputkan penerbit..." value="<?= $book["penerbit"]; ?>">
    </div>
    <div class="mb-3">
        <label for="tahun_terbit" class="form-label">tahun_terbit</label>
        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Inputkan tahun_terbit..." value="<?= $book["tahun_terbit"]; ?>">
    </div>
    <div class="mb-3">
        <label for="sinopsis" class="form-label">sinopsis</label>
        <input type="text" class="form-control" id="sinopsis" name="sinopsis" placeholder="Inputkan sinopsis..." value="<?= $book["sinopsis"]; ?>">
    </div>
    <div class="mb-3">
        <label for="path" class="form-label">path</label>
        <input type="text" class="form-control" id="path" name="path" placeholder="Inputkan path..." value="<?= $book["path"]; ?>">
    </div>    <div class="mb-3">
        <label for="status_premium" class="form-label">status_premium</label>
        <input type="text" class="form-control" id="status_premium" name="status_premium" placeholder="Inputkan status_premium..." value="<?= $book["status_premium"]; ?>">
    </div>
    <div class="mb-3">
        <label for="sampul" class="form-label">sampul</label>
        <input type="text" class="form-control" id="sampul" name="sampul" placeholder="Inputkan sampul..." value="<?= $book["sampul"]; ?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
<?= $this->endSection() ?>