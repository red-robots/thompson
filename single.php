<?php
/**
 * Displays a Single Post
 */

get_header(); ?>

	
<div class="page-content-projects">

<div id="project-items">        
<ul> 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 
 		<?php the_content(); ?>

       
<?php if(get_field('project')): ?>          

<?php while(has_sub_field('project')): ?>


<?php 
$image = get_sub_field('project_image');
if( !empty($image) ): ?>
    <li><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></li>
<?php endif; ?>



<?php endwhile; endif; ?>
</ul>
</div>
        
        



<?php endwhile; endif; ?>

</div><!-- / page-content-projects -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>