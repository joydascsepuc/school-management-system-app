<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<footer class="page-footer text-center ml-4">
  <?php $year = date('Y'); ?>
  <div class="footer-copyright text-left font-weight-bold">©<?=$year;?> Copyright: Ingenuity Software Limited, Bangladesh</div>
</footer>



<script type="text/javascript">
  $(document).ready( function () {
    $('#datatable').DataTable();

} );
</script>

<script type="text/javascript">
  $('.nav-item a').on('click', function() {
   
    $('.nav-item').children('.dropdown-menu').slideUp(150);
    
    if ($(this).parent().hasClass("show")) {
      $(this).next('.dropdown-menu').slideUp(150);
    } else {
      $(this).next('.dropdown-menu').slideDown(200);
    }

  });
</script>

</body>
</html>