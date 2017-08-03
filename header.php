<!DOCTYPE html>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>"/>

    <meta name="viewport" content="width=device-width"/>

    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11"/>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>


    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>


    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri()."/fonts/MyFontsWebfontsKit.css"; ?>"/>

    <link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>


	<?php the_field( 'google_analytics', 'option' ); ?>


	<?php wp_head(); ?>
</head>
<?php if ( is_home() ) { ?>
<body id="home">
<div id="background-home">
    <img src="<?php bloginfo( 'template_url' ); ?>/images/bg-body-home.png" alt="" border="0">
</div>
<div id="mobile-bg">
    <div id="home-header">
        <div id="home-logo">
            <a href="<?php bloginfo( 'url' ); ?>"><img
                        src="<?php bloginfo( 'template_url' ); ?>/images/thompson-custom-building-group.png" alt=""
                        border="0"></a>
        </div><!-- #home-logo -->
        <div id="home-navigation">
            <nav id="access" role="navigation">
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav>
            <div id="links2">
                <a href="<?php echo get_the_permalink( 650 ); ?>">Client Login</a>
                <a href="<?php bloginfo( 'url' ); ?>/sitemap">sitemap</a>
            </div>
        </div><!-- #home-navigation -->
    </div><!-- #home-header -->
    <div id="main" class="hide">
		<?php } else { ?>
        <body>
		<?php if ( is_page( 'Contact' ) ) { ?>
            <div id="background-sub"><img
                        src="http://thompson-cbg.com/bw/wp-content/uploads/2014/08/belle-isle-neg-edge-thompson-cbg1.jpg"
                        alt="" border="0"></div>
		<?php } elseif ( is_page( 'Projects' ) ) { ?>
		<?php } elseif ( is_page( 'company' ) ) { ?>
            <div id="background-sub"><img src="<?php bloginfo( 'template_url' ); ?>/images/bg-body.png" alt=""
                                          border="0"></div>
		<?php } elseif ( is_page( 'sitemap' ) ) { ?>
            <div id="background-sub"><img src="<?php bloginfo( 'template_url' ); ?>/images/bg-body.png" alt=""
                                          border="0"></div>
		<?php } ?>
        <div id="header">
            <div class="header-inner-wrapper">
                <div id="logo" align="center">
                    <a href="<?php bloginfo( 'url' ); ?>"><img
                                src="<?php bloginfo( 'template_url' ); ?>/images/thompson-custom-building-group-logo.png"
                                alt="" border="0" align="center"></a>
                </div><!-- #logo -->
                <div id="navigation">
                    <nav id="access2" role="navigation">
						<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                    </nav>
                </div><!-- #navigation -->
				<?php $pt = get_post_type( $post );
				if ( is_page( 'design-studio' ) || ( $pt && strcmp( $pt, 'product' ) === 0 ) ) { ?>
                    <div id="design-info">
                        <div class="wrapper">
                            <div class="title">
                                Design Studio
                            </div><!--.title-->
                            <hr/>
							<?php //menu generator
							$args  = array(
								'taxonomy'   => "product_type",
								'order'      => 'ASC',
								'orderby'    => 'term_order',
								'hide_empty' => 0
							);
							$terms = get_terms( $args );
							if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ):
								echo '<ul class="top-menu">';
								foreach ( $terms as $term ):
									echo '<li class="top"><span class="plus">+</span><span class="min">-</span>' . $term->slug;
									$args  = array(
										'post_type'      => 'product',
										'posts_per_page' => - 1,
										'orderby'        => 'menu_order',
										'tax_query'      => array(
											array(
												'taxonomy' => 'product_type',
												'field'    => 'term_id',
												'terms'    => $term->term_id,
											),
										),
									);
									$query = new WP_Query( $args );
									if ( $query->have_posts() ):
										echo '<ul class="sub-menu">';
										while ( $query->have_posts() ):
											$query->the_post();
											echo '<li class="sub"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
										endwhile;
										echo '</ul>';
										wp_reset_postdata();
									endif;
									echo '</li>';
								endforeach;
								echo '</ul>'; ?>
							<?php endif;//endif ?>
                        </div><!--.wrapper-->
                    </div>  <!-- #design-info -->
				<?php } ?>
				<?php if ( is_page( 'Contact' ) ) { ?>
                    <div id="mobile-yes">
                        <div id="background-sub"><img
                                    src="http://thompson-cbg.com/bw/wp-content/uploads/2014/08/belle-isle-neg-edge-thompson-cbg1.jpg"
                                    alt="" border="0"></div>
                    </div>
                    <div id="contact-info">
						<?php $recent = new WP_Query( "page_id=10" );
						while ( $recent->have_posts() ) : $recent->the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile;
						wp_reset_postdata(); // end of the loop. ?>
                    </div>  <!-- contact-info -->
				<?php } ?>
				<?php if ( is_page( 'company' ) ) { ?>
                    <div id="mobile-yes">
                        <div id="background-sub"><img src="<?php bloginfo( 'template_url' ); ?>/images/bg-body.png"
                                                      alt=""
                                                      border="0"></div>
                    </div>
                    <div id="company">
						<?php the_field( 'left_section' ); ?>
                    </div>  <!--  -->
				<?php } ?>
				<?php if ( is_page( 'Projects' ) ) { ?>
                    <div id="projects-links">
						<?php $the_query = new WP_Query( 'showposts=-1' ); ?>
                        <ul><?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
							<?php endwhile; ?>
                        </ul>
						<?php wp_reset_postdata(); ?>
                    </div>  <!--  -->
				<?php }
				if ( is_single( $post ) && ( $pt && strcmp( $pt, 'post' ) === 0 ) ) { ?>
                    <div id="projects-links">
						<?php $the_query = new WP_Query( 'showposts=-1' ); ?>
                        <ul><?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
							<?php endwhile; ?>
                        </ul>
						<?php wp_reset_postdata(); ?>
                    </div>  <!--  -->
				<?php } ?>
            </div><!--.header-inner-wrapper-->
            <div class="header-footer-wrapper">
                <a href="<?php echo get_the_permalink( 650 ); ?>">Client Login</a>
            </div><!--.header-footer-wrapper-->
        </div><!-- #header -->
        <div id="main">
			<?php } ?>






    

    

    

    

    

    

    

 

    

    

    

  

  