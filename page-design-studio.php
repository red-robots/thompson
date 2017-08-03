<?php
/* Template Name: Design Studio */
?>
<?php $user = wp_get_current_user();
if ( ! ( in_array( 'client', (array) $user->roles, true ) ||
            in_array( 'administrator', (array) $user->roles, true ) )
): 
    wp_redirect(get_the_permalink(650));
    exit; 
endif;?>
<?php get_header(); ?>
<?php if ( have_posts() ) :
    the_post(); ?>
    <div id="header-spacer" class="design-studio">
        <div id="logo-spacer">
            <div id="content-top">
                <img src="<?php bloginfo( 'template_url' ); ?>/images/bg-content-top.png" alt=""
                                       border="0">
            </div>
        </div>
        <div class="page-content">
            <div id="content">
                <h1><?php the_title(); ?></h1>
                <?php //menu generator
                $args    = array(
                    'taxonomy'   => "product_type",
                    'order'      => 'ASC',
                    'orderby'    => 'term_order',
                    'hide_empty' => 0
                );
                $terms         = get_terms( $args );
                if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ):?>
                    <div class="terms-wrapper">
                        <?php for($i = 0; $i<count($terms);$i++):
                            $term = $terms[$i];
                            $image = get_field('image_'.$term->slug);
                            $args2 = array(
                                'post_type'=>'product',
                                'posts_per_page'=>-1,
                                'orderby'=>'menu_order',
                                'tax_query'=>array(
                                    array(
                                        'taxonomy' => 'product_type',
                                        'field'    => 'term_id',
                                        'terms'    => $term->term_id,
                                    ),
                                ),
                            );
                            $products = get_posts($args2);
                            if($image && count($products)>0):?>
                                <div class="column-<?php echo $i+1;?>">
                                    <a href="<?php echo get_the_permalink($products[0]->ID);?>">
                                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                                        <div class="title">
                                            <h2><?php echo $term->slug;?></h2>
                                        </div><!--.title-->
                                    </a>
                                </div><!--.column-#-->
                            <?php endif;
                        endfor;?>
                        <div class="clear"></div>
                    </div><!--.terms-wrapper-->
                <?php endif;?>
            </div>
        </div><!--.page-content-->
        <div id="content-bottom">
            <img src="<?php bloginfo( 'template_url' ); ?>/images/bg-content-bottom.png" alt=""
                                      border="0">
        </div><!--.content-bottom-->
    </div><!-- .header-spacer -->
<?php endif; ?>
<?php get_footer(); ?>