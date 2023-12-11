<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="table_section layout_padding">
<?php if (session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>User Berhasil Dikomfirmasi</strong> sekarang user terkait menjadi anggota membership
        </div>
    <?php endif; ?>
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
                                    <td>trx<?= $item['id_transaksi']; ?>u<?= $item['id_user']; ?>memb<?= $item['id_membership']; ?>
                                    </td>
                                    <td>
                                        <?= $item['id_user'] ?>
                                    </td>
                                    <td>
                                        <?= $item['id_membership'] ?>
                                    </td>
                                    <td>Rp
                                        <?= number_format($item['harga'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <form action="/confirmmembership" method="post">
                                            <input type="hidden" name="id_user" value="<?= $item['id_user'] ?>">
                                            <button type="submit" name="action" value="accept"
                                                class="btn btn-success">Terima</button>
                                            <button type="submit" name="action" value="reject"
                                                class="btn btn-danger">Tolak</button>
                                        </form>
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