<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1><?= $tittle; ?></h1>
<table class="table caption-top">
    <caption>List of Book</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Judul</th>
            <th scope="col">Pengarang</th>
            <th scope="col">id_buku</th>
            <th scope="col">Action</th>
            <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data as $buku)  : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><img src="<?= base_url("covers/".$buku['sampul']); ?>" class="img-fluid rounded" style="width:80px; height:100px;" alt=""></td>
                <td><?= $buku["judul"]; ?></td>
                <td><?= $buku["pengarang"]; ?></td>
                <td><?= $buku["id_buku"]; ?></td>
                <td>
                    <a href="<?= site_url("delete/" . $buku["id_buku"]); ?>" class="btn btn-danger btn-sm">Delete</a>
                    <a href="<?= site_url("/" . $buku["id_buku"]); ?>" class="btn btn-primary btn-sm">Detail</a>
                    <a href="<?= site_url("updateBook/" . $buku["id_buku"]); ?>" class="btn btn-primary btn-sm">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>