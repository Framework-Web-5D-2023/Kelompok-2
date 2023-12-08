<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <link rel="icon" href="<?= base_url("assets/images/fevicon.png") ?>" type="image/gif">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dzikrizop</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css"); ?>">

    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

    <!-- Font Awesome style -->
    <link rel="stylesheet" href="<?= base_url("assets/css/font-awesome.min.css"); ?>">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>">
    <!-- Responsive style -->
    <link rel="stylesheet" href="<?= base_url("assets/css/responsive.css"); ?>">

    <style>
        .card img {
            max-width: 100%;
            height: auto;
        }

        .cardorder {
            height: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
        }


        .card-body {
            height: 100%;
            display: flex;
            flex-direction: column;
            margin: 50px;
        }

        .card-title,
        .card-text {
            flex-grow: 1;
        }
    </style>

</head>

<body>
    <br><br>
    <?= $this->include("layout/navbar"); ?>
    <?= $this->renderSection('content') ?>

    <!-- Your scripts should be placed at the end of the body for better performance -->

    <!-- jQuery -->
    <script src="<?= base_url("assets/js/jquery-3.4.1.min.js"); ?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?= base_url("assets/js/bootstrap.js"); ?>"></script>
    <!-- Custom JS -->
    <script src="<?= base_url("assets/js/custom.js"); ?>"></script>

    <!-- Your specific script -->
    <script>
        // Your JavaScript code here
    </script>
</body>

</html>
