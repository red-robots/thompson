<?php 
/**
* Template Name: Company Page
*/
 get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div id="header-spacer">
<div id="logo-spacer">
<div id="content-top"><img src="<?php bloginfo('template_url'); ?>/images/bg-content-top.png" alt="" border="0"></div>
</div>



<div class="page-content">

<div id="content">
 <h2><?php the_title(); ?></h2>
<?php the_content(); ?>
    
    </div>
    
     
 </div><!-- / page content -->
 
 <div id="content-bottom"><img src="<?php bloginfo('template_url'); ?>/images/bg-content-bottom.png" alt="" border="0"></div>   
 
 

 

<?php endwhile; endif; ?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>