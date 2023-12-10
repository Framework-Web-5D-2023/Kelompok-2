<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="furniture_section layout_padding">
    <div class="container">
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search by Title" aria-label="Search">
            <button id="searchBtn" class="btn btn-primary">Search</button>
        </div>
        <div class="row" id="bookList">

            <?php foreach ($data as $item): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="covers/<?= $item['sampul']; ?>" alt="<?= $item['judul']; ?>">
                        </div>
                        <div class="detail-box">
                            <h5><?= $item['judul']; ?></h5>
                            <div class="price_box">
                                <h6 class="price_heading">
                                    <span><?= $item['pengarang']; ?></span>
                                </h6>
                                <form action="/read" method="post" class="read-form">
                                    <input type="hidden" name="path" value="<?= $item['path']; ?>">
                                    <button type="submit" class="btn btn-warning" style="background-color: #ff9444;">Baca Buku</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Search Button Click Event
        $('#searchBtn').on('click', function () {
            performSearch();
        });

        // Debounce Search Input
        var debounceTimer;
        $('#searchInput').on('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function () {
                performSearch();
            }, 300);
        });

        function performSearch() {
            var searchTerm = $('#searchInput').val().toLowerCase();

            // Loop through each book in the list
            $('#bookList .box').each(function () {
                var title = $(this).find('h5').text().toLowerCase(); // Adjust this based on the title element

                // Check if the title contains the search term
                if (title.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Show message when there are no results
            if ($('#bookList .box:visible').length === 0) {
                // Display a message, e.g., $('#noResultsMessage').show();
            }
        }
    });
</script>

<?= $this->endSection() ?>
