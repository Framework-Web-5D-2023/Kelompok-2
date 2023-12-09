<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="table_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Data Transaksi</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>ID User</th>
                                <th>ID Membership</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                                <tr>
                                    <td><?= $item['id_transaksi'] ?></td>
                                    <td><?= $item['id_user'] ?></td>
                                    <td><?= $item['id_membership'] ?></td>
                                    <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success">Terima</a>
                                        <a href="#" class="btn btn-danger">Tolak</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
