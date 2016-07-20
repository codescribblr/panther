            </div><!-- /.page-body -->
            <footer class="footer" role="contentinfo">

                <?php if($page_modules = get_field('options_page_modules')):?>
                <?php foreach($page_modules as $key => $page_module):?>
                <?php include('includes/modules/' . str_replace("_", "-", $page_module['acf_fc_layout']) . '.php');?>
                <?php endforeach;?>
                <?php endif;?>

                <div class="section padding-sm-top padding-sm-bottom footer-navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <p>
                                    <img src="<?php the_field('footer_logo', 'options');?>" width="165" height="41" />
                                </p>
                                <p><?php the_field('footer_contact', 'options');?></p>
                            </div>
                            <div class="col-xs-12 col-md-4 col-md-offset-1">
                                <h5>Company</h5>
                                <?php wp_nav_menu(array(
                                        'menu' => __( 'About Menu', 'panthertheme' ),  // nav name
                                        'theme_location' => 'about-nav',                 // where it's located in the theme
                                    ));
                                ?>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <h5>Follow Us</h5>
                                <p class="social-links">
                                    <?php if($facebook = get_field('facebook_link', 'options')):?><a target="_blank" href="<?php echo $facebook;?>" class="facebook-link fa fa-facebook icon-circle-transparent"></a><?php endif;?>
                                    <?php if($twitter = get_field('twitter_link', 'options')):?><a target="_blank" href="<?php echo $twitter;?>" class="twitter-link fa fa-twitter icon-circle-transparent"></a><?php endif;?>
                                    <?php if($instagram = get_field('instagram_link', 'options')):?><a target="_blank" href="<?php echo $instagram;?>" class="instagram-link fa fa-instagram icon-circle-transparent"></a><?php endif;?>
                                    <?php if($pinterest = get_field('pinterest_link', 'options')):?><a target="_blank" href="<?php echo $pinterest;?>" class="pinterest-link fa fa-pinterest icon-circle-transparent"></a><?php endif;?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="pull-left"><?php the_field('footer_copyright', 'options');?></p>
                                <div class="clearfix visible-xs"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </footer> <!-- end footer -->

        </div> <!-- end .wrapper -->

        <!-- all js scripts are loaded in library/panther.php -->
        <?php wp_footer(); ?>
    </body>

</html> <!-- end page. what a ride! -->
