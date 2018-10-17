<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">
        <div class="header-image">
            <?php 
            if ( has_post_thumbnail()) {
                the_post_thumbnail(); 
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

        <section class="crew-section">
            <div class="wrap">
                <ul class="crew-list jefes">
                    <?php 
                        global $crewJefes_databd;
                        foreach ($crewJefes_databd as $crew) { ?>

                    <li>
                        <article class="crew-item">
                            <div class="image-crew load-images-ajax">
                                    <img data-src="<?php echo $crew['image']; ?>" alt="Sobre Uk Partners">
                                </picture>
                            </div>
                            <h1>
                                <?php echo $crew['titulo']; ?>
                            </h1>
                            <h2>
                                <?php echo $crew['charge']; ?>
                            </h2>
                            <p>
                                <?php echo $crew['texto']; ?>
                            </p>
                        </article>
                    </li>

                    <?php } ?>

                </ul>

                <ul class="crew-list">
                    <?php 
                        global $crew_databd;
                        foreach ($crew_databd as $crew) { ?>

                    <li>
                        <article class="crew-item">
                            <div class="image-crew load-images-ajax">
                                    <img data-src="<?php echo $crew['image']; ?>" alt="Sobre Uk Partners">
                                </picture>
                            </div>
                            <h1>
                                <?php echo $crew['titulo']; ?>
                            </h1>
                            <h2>
                                <?php echo $crew['charge']; ?>
                            </h2>
                            <p>
                                <?php echo $crew['texto']; ?>
                            </p>
                        </article>
                    </li>

                    <?php } ?>

                </ul>
            </div>

        </section>

    </div><!-- .entry-content -->
</article><!-- #post-## -->