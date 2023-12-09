<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="furniture_section layout_padding">
    <div class="container">
        <div class="row">

            <?php
            $membershipPackages = [
                ["duration" => "1 bulan", "price" => "170.000 rupiah", "membership_id" => 1],
                ["duration" => "2 bulan", "price" => "300.000 rupiah", "membership_id" => 2],
                ["duration" => "3 bulan", "price" => "450.000 rupiah", "membership_id" => 3]
            ];

            foreach ($membershipPackages as $package) {
                echo '<div class="col-md-6 col-lg-4">
                        <div class="box">
                            <div class="detail-box">
                                <h5>Paket Membership ' . $package["duration"] . '</h5>
                                <div class="price_box">
                                    <h6 class="price_heading">
                                        <span>' . $package["price"] . '</span>
                                    </h6>
                                    <form action="/belimembership" method="post">
                                    <input type="hidden" name="id_user" value="' . user_id() . '">
                                        <input type="hidden" name="id_membership" value="' . $package["membership_id"] . '">
                                        <button type="submit" class="btn btn-warning" style="background-color: #ff9444;">Beli Sekarang</button>
                                    </form>
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