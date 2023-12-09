<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <form action="<?= base_url("/updateBook/update/") . $book["id_buku"] ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control <?= session()->has('validation_errors') && isset(session('validation_errors')['judul']) ? 'is-invalid' : ''; ?>" id="judul" name="judul" placeholder="Inputkan Nama..." value="<?= old('judul') ?: esc($book["judul"]) ?>">
            <?php if (session()->has('validation_errors') && isset(session('validation_errors')['judul'])): ?>
                <div class="invalid-feedback">
                    <?= session('validation_errors')['judul']; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Field Pengarang -->
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control <?= session()->has('validation_errors') && isset(session('validation_errors')['pengarang']) ? 'is-invalid' : ''; ?>" id="pengarang" name="pengarang" placeholder="Inputkan Nama Pengarang..." value="<?= old('pengarang') ?: esc($book["pengarang"]) ?>">
            <?php if (session()->has('validation_errors') && isset(session('validation_errors')['pengarang'])): ?>
                <div class="invalid-feedback">
                    <?= session('validation_errors')['pengarang']; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Field Penerbit -->
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control <?= session()->has('validation_errors') && isset(session('validation_errors')['penerbit']) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" placeholder="Inputkan Penerbit..." value="<?= old('penerbit') ?: esc($book["penerbit"]) ?>">
            <?php if (session()->has('validation_errors') && isset(session('validation_errors')['penerbit'])): ?>
                <div class="invalid-feedback">
                    <?= session('validation_errors')['penerbit']; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Field Tahun Terbit -->
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="text" class="form-control <?= session()->has('validation_errors') && isset(session('validation_errors')['tahun_terbit']) ? 'is-invalid' : ''; ?>" id="tahun_terbit" name="tahun_terbit" placeholder="Inputkan Tahun Terbit..." value="<?= old('tahun_terbit') ?: esc($book["tahun_terbit"]) ?>">
            <?php if (session()->has('validation_errors') && isset(session('validation_errors')['tahun_terbit'])): ?>
                <div class="invalid-feedback">
                    <?= session('validation_errors')['tahun_terbit']; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Sisipkan blok serupa untuk setiap field -->

        <div class="mb-3">
            <label for="sinopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control <?= session()->has('validation_errors') && isset(session('validation_errors')['sinopsis']) ? 'is-invalid' : ''; ?>" id="sinopsis" name="sinopsis" placeholder="Inputkan sinopsis..."><?= old('sinopsis') ?: esc($book["sinopsis"]) ?></textarea>
            <?php if (session()->has('validation_errors') && isset(session('validation_errors')['sinopsis'])): ?>
                <div class="invalid-feedback">
                    <?= session('validation_errors')['sinopsis']; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Blok serupa untuk setiap field -->

        <div class="mb-3">
            <label for="status_premium" class="form-label">Status Premium</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="status_premium" name="status_premium" value="1" <?= old('status_premium') || ($book["status_premium"] == 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="status_premium">Premium</label>
            </div>
            <?php if (session()->has('validation_errors') && isset(session('validation_errors')['status_premium'])): ?>
                <div class="invalid-feedback">
                    <?= session('validation_errors')['status_premium']; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Blok serupa untuk setiap field -->

        <div class="col-sm-12 mb-3">
            <div class="form-group">
                <label for="pdfFile">PDF File</label>
                <input type="file" class="form-control <?= session()->has('validation_errors') && isset(session('validation_errors')['pdfFile']) ? 'is-invalid' : ''; ?>" id="pdfFile" name="pdfFile" accept=".pdf">
                <?php if (session()->has('validation_errors') && isset(session('validation_errors')['pdfFile'])): ?>
                    <div class="invalid-feedback">
                        <?= session('validation_errors')['pdfFile']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Blok serupa untuk setiap field -->

        <div class="col-sm-12 mb-3">
            <div class="form-group">
                <label for="sampul">Image</label>
                <input type="file" class="form-control <?= session()->has('validation_errors') && isset(session('validation_errors')['sampul']) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" accept="image/*">
                <?php if (session()->has('validation_errors') && isset(session('validation_errors')['sampul'])): ?>
                    <div class="invalid-feedback">
                        <?= session('validation_errors')['sampul']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
