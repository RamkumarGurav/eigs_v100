<footer class="main_footer">
   <div class="container">
      <div class="row">
         <div class="col-md-3 col-sm-12 col-xs-12 wow animated slideInUp" data-wow-duration="1s">
            <!-- <h4 class="footer_head">Navigation</h4> -->
            <ul class="footer_nav1">
               <li><a href="about-us">About Us</a></li>
               <li><a href="services">Services</a></li>
               <li><a href="careers">Careers</a></li>
            </ul>
         </div>
         <div class="col-md-6 col-sm-12 col-xs-12 wow animated slideInUp" data-wow-duration="1s">
            <a class="navbar-brand" href="<?= MAINSITE ?>"><img src="<?= IMAGE ?>logo-footer.png" class="logo_mwidth"
                  alt=""></a>
            <div class="copy_footer">
               <p class="main_para_1">© Engineers Innovation Group 2022 All Rights Reserved | Design by <a
                     href="https://www.marswebsolution.com/" target="_blank">Marsweb</a></p>
            </div>
         </div>
         <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="foot_social">
               <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
               <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
               <a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
         </div>
      </div>
   </div>
</footer>
<div class="pc_whatsapp"><a
      href="https://api.whatsapp.com/send?phone=+919742743973&amp;text=Engineers%20Innovation%20Group" target="_blank"
      class="whatsapp"><img src="<?= IMAGE ?>whatsapp-new2.png" alt="Connect Us"></a></div>

<script src="<?= JS ?>jquery.min.js"></script>
<!-- <script type="text/javascript" src="<?= JS ?>jquery-3.2.1.min.js"></script> -->
<script type="text/javascript" src="<?= JS ?>parsley.min.js"></script>
<script src="<?= JS ?>bootstrap.min.js"></script>
<script src="<?= JS ?>menubar.js"></script>
<script src='<?= JS ?>owl.carousel.min.js'></script>
<script src="<?= JS ?>wow.js"></script>
<script src="<?= JS ?>index.js"></script>
<script src="<?= JS ?>lightbox-plus-jquery.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
      $('#contact_us_form').parsley();


      console.log("Parsley initialized");
   });
</script>
</body>

</html>