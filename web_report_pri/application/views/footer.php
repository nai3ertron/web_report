<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php  if($this->session->userdata('user_id') !=NULL) { ?>

  <style>

    #foot{

      margin-top:3px;
      clear:both;

  }
</style>

<div class="row">
  <div class="col-md-12" id="foot">

    <footer class="bg-info">
      footer
   </footer>
    </div>

  </div>

<?php  } ?>
</body>
</html>
