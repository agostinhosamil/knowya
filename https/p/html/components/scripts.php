<?php function scripts () { ?>
  <script type="text/javascript">
    window.appConfig = {
      rootPath: '<?= (defined("_UR_")) ? _UR_ : "/" ?>'
    }
  </script>
  <script src="<?= (defined("_UR_")) ? _UR_ : "" ?>https/js/htmlBuilder.js" type="text/javascript"></script>
  <script src="<?= (defined("_UR_")) ? _UR_ : "" ?>https/js/main.js" type="text/javascript"></script>
<?php } ?>
