</div>
<!-- General JS Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= BaseURL() ?>/public/js/stisla.js"></script>

<!-- JS Libraies -->
<script type="text/javascript" src="<?= BaseURL(); ?>/public/js/sweetalert2.all.min.js"></script>
<?php if (isset($_SESSION)) Flasher::Flash() ?>

<!-- Template JS File -->
<script src="<?= BaseURL() ?>/public/js/stisla-script.js"></script>

<!-- Page Specific JS File -->
<?php if (isset($data["js"])) : ?>
    <?php foreach ($data["js"] as $key => $js) : ?>
        <script src="<?= BaseURL() ?>/public/js/<?= $js ?>.js"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>

</html>