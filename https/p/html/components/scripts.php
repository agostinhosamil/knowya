<?php function scripts () { ?>
  <script type="text/javascript">
    window.appConfig = {
      rootPath: '<?= (defined("_UR_")) ? _UR_ : "/" ?>'
    }
  </script>
  
  <?= script('htmlBuilder.js') ?>
  <?= script('main.js') ?>
<?php } ?>
