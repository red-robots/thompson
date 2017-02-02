<?php 
/**
* Template Name: Contact Page
*/
 get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div id="header-spacer">
<div id="logo-spacer">

</div>

<div class="page-content">


 
     
 </div><!-- / page content -->

<?php endwhile; endif; ?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>