                <footer class="footer">
                   
                    <div class="row">
                        
                        <div class="large-6 columns small-content-centered text-left">
                            <!-- <img alt="Connect via LinkedIn" src="<?php echo get_template_directory_uri() . '/img/assets/icons/linkedin-circle-white-32x32.png'; ?>" /> -->
                            <div class="poster">
                                <div class="movement">
                                    <div class="face front">
                                        <a class="social-icon" href="#">
                                            <div class="circle">
                                                <i class="icon-linkedin-rect"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <?php if(!MOBILE): ?>
                                    <div class="face back">
                                        <a class="social-icon" href="#">
                                            <div class="circle">
                                                <i class="icon-linkedin-rect"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="poster">
                                <div class="movement">
                                    <div class="face front">
                                        <a class="social-icon" href="#">
                                            <div class="circle">
                                                <i class="icon-facebook-1"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <?php if(!MOBILE): ?>
                                    <div class="face back">
                                        <a class="social-icon" href="#">
                                            <div class="circle">
                                                <i class="icon-facebook-1"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="poster">
                                <div class="movement">
                                    <div class="face front">
                                        <a class="social-icon" href="#">
                                            <div class="circle">
                                                <i class="icon-instagram-filled"></i>
                                            </div>
                                        </a>  
                                    </div>
                                    <?php if(!MOBILE): ?>
                                    <div class="face back">
                                        <a class="social-icon" href="#">
                                            <div class="circle">
                                                <i class="icon-instagram-filled"></i>
                                            </div>
                                        </a>  
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                              
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
                    <div class="row">
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
