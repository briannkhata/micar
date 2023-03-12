<footer class="footer-2 page-section-pt">
 
   
    <div class="copyright">
     <div class="container">
      <div class="row">
       <div class="col-lg-6 col-md-12">
        <div class="text-lg-start text-center">
        <p>©Copyright <?=date('Y');?> MiCar All rights Reserved</p>
       </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <ul class="list-inline text-lg-end text-center">
          <li><a href="<?=base_url();?>Home/privacy">privacy policy </a> | </li>
          <li><a href="<?=base_url();?>Home/terms">terms and conditions </a> |</li>
          <li><a href="<?=base_url();?>Home/faq">FAQs </a> |</li>
          <li><a href="<?=base_url();?>Home/careers">Careers </a></li>
        </ul>
      </div>
      </div>
     </div>
    </div>
</footer>

 <!--=================================
 footer -->



 <!--=================================
 back to top -->

<div class="car-top">
  <span><img src="<?=base_url();?>dist/images/car.png" alt=""></span>
</div>

 <!--=================================
 back to top -->


<!--=================================
 jquery -->

<!-- jquery  -->
<script type="text/javascript" src="<?=base_url();?>dist/js/jquery-3.6.0.min.js"></script>

<!-- bootstrap -->
<script type="text/javascript" src="<?=base_url();?>dist/js/popper.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/js/bootstrap.min.js"></script>

<!-- mega-menu -->
<script type="text/javascript" src="<?=base_url();?>dist/js/mega-menu/mega_menu.js"></script>

<!-- appear -->
<script type="text/javascript" src="<?=base_url();?>dist/js/jquery.appear.js"></script>

<!-- counter -->
<script type="text/javascript" src="<?=base_url();?>dist/js/counter/jquery.countTo.js"></script>

<!-- owl-carousel -->
<script type="text/javascript" src="<?=base_url();?>dist/js/owl-carousel/owl.carousel.min.js"></script>

<!-- select -->
<script type="text/javascript" src="<?=base_url();?>dist/js/select/jquery-select.js"></script>

<!-- magnific popup -->
<script type="text/javascript" src="<?=base_url();?>dist/js/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- revolution -->
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>dist/revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- custom -->
<script type="text/javascript" src="<?=base_url();?>dist/js/custom.js"></script>

<script type="text/javascript">
  (function($){
  "use strict";

    var tpj=jQuery;
      var revapi4;
      tpj(document).ready(function() {
        if(tpj("#rev_slider_4_1").revolution == undefined){
          revslider_showDoubleJqueryError("#rev_slider_4_1");
        }else{
          revapi4 = tpj("#rev_slider_4_1").show().revolution({
            sliderType:"standard",
            sliderLayout:"fullwidth",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
              keyboardNavigation:"off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation:"off",
             mouseScrollReverse:"default",
              onHoverStop:"off",
              bullets: {
                enable:true,
                hide_onmobile:false,
                style:"uranus",
                hide_onleave:false,
                direction:"horizontal",
                h_align:"right",
                v_align:"bottom",
                h_offset:40,
                v_offset:40,
                space:8,
                tmp:'<span class="tp-bullet-inner"></span>'
              }
            },
            visibilityLevels:[1240,1024,778,480],
            gridwidth:1170,
            gridheight:900,
            lazyType:"none",
            parallax: {
              type:"mouse",
              origo:"enterpoint",
              speed:400,
              levels:[2,5,7,10,12,35,40,42,45,46,47,48,49,50,51,55],
              type:"mouse",
            },
            shadow:0,
            spinner:"spinner3",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            disableProgressBar:"on",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
              simplifyAll:"off",
              nextSlideOnWindowFocus:"off",
              disableFocusListener:false,
            }
          });
        }
      });
 })(jQuery);


        // show the alert
        setTimeout(function() {
            $(".alert").alert('close');
        }, 2000);

</script>

</body>
</html>
