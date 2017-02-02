<?php get_header(); ?>



<div class="page-content">



<div id="content-text">


<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'heart-tutoring' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post(); ?>
				
<div class="category-archive">
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<div class="blog-date"><?php the_date(); ?></div>

        <br><?php  echo get_excerpt(200); ?> 
        
</div>        

	<?php endwhile; ?>
<?php endif; ?>
		</div>



        
        
</div><!-- single post container -->


</div>




<?php // get_sidebar(); ?>
<?php get_footer(); ?>