<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="/updateaction" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $detail['data']['id'] ?>">
                        <input type="hidden" name="jumlahbefore" value="<?= $detail['data']['jumlah'] ?>">
                        <input type="hidden" name="hargabefore" value="<?= $detail['data']['jumlahbayar'] ?>">

                        <?php
                        $fields = [
                            'jumlah' => 'Jumlah',
                            'penerima' => 'Nama Penerima',
                            'provinsi' => 'Provinsi',
                            'kabupaten' => 'Kota/Kabupaten',
                            'kecamatan' => 'Kecamatan',
                            'kodepos' => 'Kode Pos',
                            'alamat' => 'Alamat Lengkap',
                        ];

                        foreach ($fields as $fieldName => $label): ?>
                            <div class="form-group">
                                <?php if ($fieldName === 'jumlah'): ?>
                                    <label for="<?= $fieldName ?>">
                                        <?= $label ?>:
                                    </label>
                                    <input type="number" class="form-control" id="<?= $fieldName ?>" name="<?= $fieldName ?>"
                                        required min="1"
                                        value="<?= old($fieldName) !== null ? old($fieldName) : (isset($detail['data'][$fieldName]) ? $detail['data'][$fieldName] : '') ?>">
                                <?php else: ?>
                                    <label for="<?= $fieldName ?>">
                                        <?= $label ?>:
                                    </label>
                                    <input type="text"
                                        class="form-control <?= $detail['validation'] !== null ? ($detail['validation']->hasError($fieldName) ? 'is-invalid' : '') : ''; ?>"
                                        id="<?= $fieldName ?>" name="<?= $fieldName ?>"
                                        value="<?= old($fieldName) !== null ? old($fieldName) : (isset($detail['data'][$fieldName]) ? $detail['data'][$fieldName] : '') ?>">
                                    <div class="invalid-feedback">
                                        <?= $detail['validation'] !== null ? $detail['validation']->getError($fieldName) : ''; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                        <br><br>
                        <button type="submit" class="btn btn-primary col-md-6 mx-auto"
                            style="background-color: #70b4bc;">Ubah</button>
                        <br>
                    </form>

                </div>
                <br>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>