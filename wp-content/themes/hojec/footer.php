<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
?>
<!--Site Footer Start-->
<footer class="site-footer">
    <div class="site-footer__top">
        <div class="container">
            <div class="site-footer__top-inner">
                <div class="site-footer__top-left">
                    <div class="site-footer__top-logo">
                        <a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/resources/footer-logo.png" alt=""></a>
                    </div>
                    <div class="site-footer__top-title-box">
                        <h3 class="site-footer__top-title">Conecte-se com a Hoje.C nos nossos canais sociais oficiais</h3>
                    </div>
                </div>
                <div class="site-footer__top-right">
                    <div class="site-footer__top-right-social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__middle">
        <div class="site-footer-shape"
             style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/shapes/site-footer-shape.png)"></div>
        <div class="container">
            <div class="site-footer__bottom">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="site-footer__bottom-inner">
                            <div class="site-footer__bottom-left text-center">
                                <p class="site-footer__bottom-text text-center">© 2021 Hoje.C Comunicação. Todos os direitos reservados - Desenvolvido por <a
                                        href="https://agencianetwork.com.br" target="_blank">Agência Network</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->


</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="index.html" aria-label="logo image"><img src="<?php echo get_template_directory_uri() ?>/assets/images/resources/logo-1.png" width="155"
                                                              alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:needhelp@packageName__.com">needhelp@qutiiz.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-pinterest-p"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Here..." />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/jarallax/jarallax.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/nouislider/nouislider.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/odometer/odometer.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/swiper/swiper.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/tiny-slider/tiny-slider.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/wnumb/wNumb.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/wow/wow.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/isotope/isotope.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/countdown/countdown.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/vegas/vegas.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/vendors/timepicker/timePicker.js"></script>




<!-- template js -->
<script src="<?php echo get_template_directory_uri() ?>/assets/js/qutiiz.js"></script>
<?php wp_footer(); ?>
</body>
</html>