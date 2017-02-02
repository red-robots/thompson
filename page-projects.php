<?php 
/**
* Template Name: Projects
*/
 get_header(); ?>




<div class="page-content-projects">

<!-- -->
<div id="project-items">        
<ul>

<?php $the_query = new WP_Query( 'showposts=-1' ); ?>

 

<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

<?php if(get_field('project')): ?>          

<?php while(has_sub_field('project')): ?>


<?php 
$image = get_sub_field('project_image');
if( !empty($image) ): ?>
    <li><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /> </li>
<?php endif; ?>


<?php endwhile; endif; ?>

 <?php endwhile;?>
</ul>
</div>




 <!-- -->   
     
 </div><!-- / page content -->



<?php //get_sidebar(); ?>
<?php get_footer(); ?>