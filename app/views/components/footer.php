<!-- Feather Icon -->
<script type="text/javascript" src="https://unpkg.com/feather-icons"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script type="text/javascript">
    feather.replace();
</script>

<!-- DataTables -->
<script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<!-- JS Libraies -->
<script type="text/javascript" src="<?= BaseURL(); ?>/public/js/sweetalert2.all.min.js"></script>
<!-- Moment.js -->
<script type="text/javascript" src="<?= BaseURL(); ?>/public/vendor/momentjs/moment.js"></script>
<?php if (isset($_SESSION)) Flasher::Flash() ?>

<!-- Custom Script -->
<?php require_once("public/js/dkode-script.php"); ?>

</body>

</html>