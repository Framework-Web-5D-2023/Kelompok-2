<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <!-- Search Form -->
    <div class="input-group mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by ID Buku">
        <button id="searchBtn" class="btn btn-primary">Search</button>
    </div>

    <table class="table table-bordered caption-top">

        <thead class="table-dark">
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Judul</th>
                <th scope="col">Pengarang</th>
                <th scope="col">ID Buku</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $buku): ?>
                <tr>
                    <td>
                        <img src="<?= base_url("covers/" . $buku['sampul']); ?>" class="img-fluid rounded"
                            style="width: 80px; height: 100px; object-fit: cover;" alt="">
                    </td>
                    <td><?= $buku["judul"]; ?></td>
                    <td><?= $buku["pengarang"]; ?></td>
                    <td><?= $buku["id_buku"]; ?></td>
                    <td>
                        <a href="<?= base_url("delete/" . $buku["id_buku"]); ?>"
                            class="btn btn-danger btn-sm">Delete</a>
                        <a href="<?= base_url("/detail/" . $buku["id_buku"]); ?>"
                            class="btn btn-primary btn-sm">Detail</a>
                        <a href="<?= base_url("updateBook/" . $buku["id_buku"]); ?>"
                            class="btn btn-primary btn-sm">Update</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Search Button Click Event
        $('#searchBtn').on('click', function () {
            var searchTerm = $('#searchInput').val().toLowerCase();

            // Loop through each row in the table
            $('tbody tr').each(function () {
                var bookId = $(this).find('td:nth-child(5)').text().toLowerCase(); // Adjust this based on the column index

                // Check if the book ID contains the search term
                if (bookId.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>
