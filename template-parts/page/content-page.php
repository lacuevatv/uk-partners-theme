
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header page-header">
        <div class="header-image">
            <?php 
            if ( has_post_thumbnail()) {
                the_post_thumbnail(); 
                echo '<span class="shutter"></span>';
            } else {
                echo '<picture>';
                    echo '<source srcset="' . IMAGES_DIR . 'headermobile-default.jpg" media="(max-width: 769px)">';
                    echo '<img src="' . IMAGES_DIR . 'header-default.jpg" alt="'. get_the_title() . ' - ' .get_bloginfo('name').'">';
                echo '</picture>';
                echo '<span class="shutter"></span>';
            }
            ?>  
        </div>
        
        <div class="wrap">
            <?php the_title( '<h1 class="entry-title page-title-header">', '</h1>' ); ?>
        </div>
        
    </header><!-- .entry-header -->

	<div class="entry-content page-content-wrapper">
        <div class="wrap">
            <div class="main-content-editor">
            <?php
                the_content();
            ?>
            </div>
		</div>
		

	</div><!-- .entry-content -->
</div><!-- #post-## -->