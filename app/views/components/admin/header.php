<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Sistem Informasi Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember">
    <meta name="author" content="DKODE Creative">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= BaseURL(); ?>/public/favicon.ico">
    <title><?= $data['title'] ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= BaseURL() ?>/public/vendor/datatables/css/datatables.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= BaseURL() ?>/public/css/stisla.css">
    <link rel="stylesheet" href="<?= BaseURL() ?>/public/css/stisla-component.css">

    <!-- Jquery Load -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="<?= BaseURL() ?>/public/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= BaseURL() ?>/public/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>

    <!-- Specific CSS Page -->
    <?php if (isset($data["css"])) : ?>
        <?php foreach ($data["css"] as $key => $css) : ?>
            <link rel="stylesheet" href="<?= BaseURL() ?>/public/css/<?= $css ?>.css">
        <?php endforeach; ?>
    <?php endif; ?>

</head>

<body>
    <div id="app">