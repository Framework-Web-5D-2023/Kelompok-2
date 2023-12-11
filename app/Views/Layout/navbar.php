<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgba(240, 240, 240, 0.92);">
            <a class="navbar-brand" href="#" style="padding-left: 20px">
                <span>
                    SukaBaca
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=base_url("/");?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("/product");?>">Koleksi Buku</a>
                    </li>
                    <?php if (in_groups('user')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("/membership");?>">Membership</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("/about");?>">About</a>
                    </li>
                    <?php if (in_groups('admin')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("/crud");?>">Perbarui Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("/halamanCreate");?>">Tambah Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("/alltransaction");?>">Semua Transaksi</a>
                        </li>
                    <?php endif; ?>
                    <!-- User dropdown menu for authenticated users -->
                    <?php if (logged_in()) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <h5 class="dropdown-item" href="#"><?= user()->username; ?></h5>
                                <a class="dropdown-item" href="<?= base_url("/logout"); ?>">Logout</a>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
