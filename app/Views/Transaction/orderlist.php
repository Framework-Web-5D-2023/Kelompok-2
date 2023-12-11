<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="furniture_section layout_padding">
    <?php if (session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Transaksi Berhasil dibuat</strong> tunggu maksimal 1x24 jam hingga admin mengkonfirmasi
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ($transaksi): ?>
                    <h2>Transaction Details</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>ID User</th>
                                <th>ID Membership</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    trx
                                    <?= $transaksi['id_transaksi']; ?>u
                                    <?= $transaksi['id_user']; ?>memb
                                    <?= $transaksi['id_membership']; ?>
                                </td>
                                <td>
                                    <?= $transaksi['id_user']; ?>
                                </td>
                                <td>
                                    <?= $transaksi['id_membership']; ?>
                                </td>
                                <td>Rp
                                    <?= number_format($transaksi['harga'], 0, ',', '.'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#caraBayarModal"
                        style="background-color: #2596be; border-color: #2596be;">
                        Cara Bayar?
                    </button>

                    <div class="modal fade" id="caraBayarModal" tabindex="-1" role="dialog"
                        aria-labelledby="caraBayarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="caraBayarModalLabel">Cara Bayar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Add your payment method information here -->

                                    <p>Metode pembayaran:</p>
                                    <p>Bank: XXXX</p>
                                    <p>Nomor Rekening: XXXX</p>
                                    <p> Lakukan Pembayaran dengan cara transfer ke rekening di atas, dengan menambahkan
                                        catatan pada transfer:</p>
                                    trx
                                    <?= $transaksi['id_transaksi']; ?>u
                                    <?= $transaksi['id_user']; ?>memb
                                    <?= $transaksi['id_membership']; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <h2>Kamu belum melakukan pesanan.</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->


<?= $this->endSection() ?>