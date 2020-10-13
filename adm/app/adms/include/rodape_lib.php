<?php
//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- CDN Awesome <script src="https://kit.fontawesome.com/e7b4566ef7.js" crossorigin="anonymous"></script>--->
<script src="<?php echo pg; ?>/assets/js/dashboard.js"></script>
<script src="<?php echo pg; ?>/assets/js/all.min.js"></script>
