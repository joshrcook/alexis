    </div><!-- end #content -->
</div><!-- end #content-wrapper -->
                <footer class="footer">
                   
                    <div class="row">
                        
                        <div class="large-6 columns small-content-centered text-left">
                            <!-- <img alt="Connect via LinkedIn" src="<?php echo get_template_directory_uri() . '/img/assets/icons/linkedin-circle-white-32x32.png'; ?>" /> -->
                            <?php $social_icons = array(
                                'linked-in' => array(
                                    'class' => 'icon-linkedin-sign',
                                    'link' => 'http://www.linkedin.com/pub/alexis-contreras/30/a54/6a2',
                                    'color' => '#5ba8cf'
                                ),
                                'facebook' => array(
                                    'class' => 'icon-facebook',
                                    'link' => 'https://www.facebook.com/alexis.e.contreras.39',
                                    'color' => '#3a5998'
                                ),
                                'instagram' => array(
                                    'class' => 'icon-instagram',
                                    'link' => 'http://instagram.com/acontrrs88',
                                    'color' => '#ffa876'
                                ),
                                'email' => array(
                                    'class' => 'icon-envelope',
                                    'link' => 'mailto:aecs.contreras@gmail.com',
                                    'color' => '#1c91ff'
                                )
                            ); 
                            ?>
                            <?php foreach($social_icons as $icon): ?>
                                <div class="poster">
                                    <div class="movement">
                                        <div class="face front">
                                            <a class="social-icon" href="<?php echo $icon['link']; ?>">
                                                <div class="circle">
                                                    <i class="<?php echo $icon['class']; ?>"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <?php if(!MOBILE): ?>
                                        <div class="face back">
                                            <a class="social-icon" href="<?php echo $icon['link']; ?>">
                                                <div class="circle">
                                                    <i class="<?php echo $icon['class']; ?>" style="color: <?php echo $icon['color']; ?>;"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                              
                        </div>                      
                        <div class="large-6 columns hide-for-small asap copyright text-right">
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
