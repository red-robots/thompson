<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 
get_header(); ?>



<div id="header-spacer">
<div id="logo-spacer">
<div id="content-top"><img src="<?php bloginfo('template_url'); ?>/images/bg-content-top.png" alt="" border="0"></div>
</div>

<div class="page-content">

<div id="content">
    
    
    <article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'We&rsquo;re sorry. The page you are looking for cannot be found.', 'avalillys' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Please use the links below to browse our site.', 'olive' ); ?></p>
				  <?php wp_list_pages('title_li='); ?>
               
				</div><!-- .entry-content -->
			</article>
    
    
 </div><!-- / page content -->

<div id="content-bottom"><img src="<?php bloginfo('template_url'); ?>/images/bg-content-bottom.png" alt="" border="0"></div>     


 </div><!-- / page content -->


<?php //get_sidebar(); ?>
<?php get_footer(); ?>