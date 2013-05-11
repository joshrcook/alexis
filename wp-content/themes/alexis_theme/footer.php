                
                <footer class="footer">
                   
                    <div class="row">
                        
                        <div class="large-6 columns small-content-centered text-left">
                            <a class="social-icon" href="#"><img alt="Connect via LinkedIn" src="<?php echo get_template_directory_uri() . '/img/assets/icons/linkedin-circle-white-32x32.png'; ?>" /></a>
                            <a class="social-icon" href="#"><img alt="Connect via Facebook" src="<?php echo get_template_directory_uri() . '/img/assets/icons/facebook-circle-white-32x32.png'; ?>" /></a>
                            <a class="social-icon" href="#"><img alt="Connect via Instagram" src="<?php echo get_template_directory_uri() . '/img/assets/icons/instagram-circle-white-32x32.png'; ?>" /></a>                            
                        </div>
                        
                        <div class="large-6 columns hide-for-small copyright crimson text-right">
                            Copyright &copy; <?php echo date('Y'); ?>, Alexis Contreras
                        </div>
                        
                    </div>
                    
                </footer>

                </div><!-- end #outer-container -->
                <section role="complementary-nav">
                    <div class="row">
                        <p class="header-replace columns">&nbsp;</p>
                    </div>
                    <div class="row"">
                         <div class="columns">
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <ul class="columns">
                        <?php 
                        $menu_items = get_nav_menu_items('main-nav');
                        global $post;

                        foreach($menu_items as $menu_item) {
                            echo '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                        }

                        ?>
                        </ul>
                    </div>
                </section>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
