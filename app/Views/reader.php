<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <embed src="<?= base_url('books/' . $path) ?>" width="100%" height="600px" type="application/pdf" />
</div>

<?= $this->endSection() ?>
