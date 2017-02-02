<?php 
/**
* Template Name: Sitemap Page
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
     

<div id="sitemap">
<ul>
<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
<?php wp_list_pages('title_li=','sort_column=menu_order'); ?>
</ul>
</div>   
     
     </div>
</div>     
<div id="content-bottom"><img src="<?php bloginfo('template_url'); ?>/images/bg-content-bottom.png" alt="" border="0"></div>     
     
 </div>





<?php endwhile; endif; ?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>