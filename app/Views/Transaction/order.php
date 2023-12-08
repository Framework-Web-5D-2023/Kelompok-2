<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<style>
    .product-info {
        margin-bottom: 20px;
    }

    .product-info img {
        max-width: 100%;
        height: auto;
    }

    .form-container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: bold;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <!-- Gambar dan Keterangan Produk -->
        <div class="col-md-6">
            <div class="card product-info">
                <div class="card-body">
                    <div class="text-center">
                        <img src="../assets/images/<?= $detail['imageurl'] ?>" alt="<?= $detail['nama'] ?>">
                    </div>
                    <br>
                    <p><?= $detail['nama'] ?></p>
                    <p>Harga: Rp <?= number_format($detail['harga'], 0, ',', '.') ?></p>
                    <p>Merek: <?= $detail['merek'] ?></p>
                </div>
            </div>
        </div>

        <!-- Formulir -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/save" method="post">
                        <input type="hidden" name="id_product" value="<?= $detail['id'] ?>">
                        <input type="hidden" name="nama" value="<?= $detail['nama'] ?>">
                        <input type="hidden" name="harga" value="<?= $detail['harga'] ?>">

                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number"
                                class="form-control <?= isset($validation) ? ($validation->hasError('jumlah') ? 'is-invalid' : '') : ''; ?>"
                                id="jumlah" name="jumlah" min="1" value="<?= old('jumlah') ?>">
                            <div class="invalid-feedback">
                                <?= isset($validation) ? $validation->getError('jumlah') : ''; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="penerima">Nama Penerima:</label>
                            <input type="text"
                                class="form-control <?= isset($validation) ? ($validation->hasError('penerima') ? 'is-invalid' : '') : ''; ?>"
                                id="penerima" name="penerima" value="<?= old('penerima')?>">
                            <div class="invalid-feedback">
                                <?= isset($validation) ? $validation->getError('penerima') : ''; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="provinsi">Provinsi:</label>
                            <input type="text"
                                class="form-control <?= isset($validation) ? ($validation->hasError('provinsi') ? 'is-invalid' : '') : ''; ?>"
                                id="provinsi" name="provinsi" value="<?= old('provinsi')?>">
                            <div class="invalid-feedback">
                                <?= isset($validation) ? $validation->getError('provinsi') : ''; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kabupaten">Kota/Kabupaten:</label>
                            <input type="text"
                                class="form-control <?= isset($validation) ? ($validation->hasError('kabupaten') ? 'is-invalid' : '') : ''; ?>"
                                id="kabupaten" name="kabupaten" value="<?= old('kabupaten')?>">
                            <div class="invalid-feedback">
                                <?= isset($validation) ? $validation->getError('kabupaten') : ''; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kecamatan">Kecamatan:</label>
                            <input type="text"
                                class="form-control <?= isset($validation) ? ($validation->hasError('kecamatan') ? 'is-invalid' : '') : ''; ?>"
                                id="kecamatan" name="kecamatan" value="<?= old('kecamatan')?>">
                            <div class="invalid-feedback">
                                <?= isset($validation) ? $validation->getError('kecamatan') : ''; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kodePos">Kode Pos:</label>
                            <input type="number"
                                class="form-control <?= isset($validation) ? ($validation->hasError('kodePos') ? 'is-invalid' : '') : ''; ?>"
                                id="kodePos" name="kodePos" value="<?= old('kodePos')?>">
                            <div class="invalid-feedback">
                                <?= isset($validation) ? $validation->getError('kodePos') : ''; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap:</label>
                            <textarea
                                class="form-control <?= isset($validation) ? ($validation->hasError('alamat') ? 'is-invalid' : '') : ''; ?>"
                                id="alamat" name="alamat" required style="resize: none;"><?= old('alamat')?></textarea>
                            <div class="invalid-feedback">
                                <?= isset($validation) ? $validation->getError('alamat') : ''; ?>
                            </div>
                        </div>

                        <br><br>
                        <button type="submit" class="btn btn-primary col-md-6 mx-auto"
                            style="background-color: #70b4bc;">Pesan</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
