<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="furniture_section layout_padding">
    <div class="container">
        <div class="row">

            <?php
            foreach ($data as $item) {
            echo '<div class="col-md-6 col-lg-4">
                <div class="box">
                    <div class="img-box">
                        <img src="covers/'. $item["sampul"] . '" alt="' . $item["judul"] . '">
                    </div>
                    <div class="detail-box">
                        <h5>' . $item["judul"] . '</h5>
                            <div class="price_box">
                                <h6 class="price_heading">
                                    <span> ' . $item["pengarang"] . '</span>
                                </h6>
                                <a href="/read/' . $item['path'] . '">Baca Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>

        </div>
    </div>
</section>

<?= $this->endSection() ?>