
    <!-- footer Wrapper End -->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url() ?>assets/js/owl.carousel.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.countTo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.inview.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.menu-aim.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
    

    <script>
       $(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});
</script>
</body>

</html>