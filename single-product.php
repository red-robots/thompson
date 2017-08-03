<?php
/**
 * Displays a Single Product Post
 */?>
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
    <div class="page-content-projects template-product">
        <div class="product-description">
            <div class="wrapper">
                <h1><?php the_title();?></h1>
                <?php $recommender = get_field('recommender');
                if($recommender):?>
                    <div class="recommender">
                        <?php foreach($recommender as $block):?>
                            <div class="block">
                                <?php $title = $block['title'];
                                $recommended = $block['recommended'];
                                if($title):?>
                                    <div class="title">
                                        <?php echo $title;?>
                                    </div><!--.title-->
                                <?php endif;
                                if($recommended):?>
                                    <div class="recommended">
                                        <?php foreach($recommended as $item):
                                            $i_title = $item['title'];
                                            $i_desc = $item['description'];
                                            $i_price = $item['price'];
                                            $i_web = $item['website'];
                                            $i_email = $item['email_address'];
                                            if($i_desc||$i_price||$i_title||$i_web||$i_email):?>
                                                <div class="item">
                                                    <div class="column-1">

                                                        <?php if($i_title):?>
                                                            <div class="title">
                                                                <?php echo $i_title;?>
                                                            </div><!--.title-->
                                                        <?php endif;?>
                                                        <?php if($i_desc || $i_email):?>
                                                            <div class="desc">
                                                                <?php if($i_desc) echo $i_desc;?>
                                                                <div class="email">
                                                                    <a href="mailto:<?php echo $i_email;?>"><?php echo $i_email;?></a>
                                                                </div><!--.email-->
                                                            </div><!--.desc-->
                                                        <?php endif;?>
                                                    </div><!--.column-1-->
                                                    <div class="column-2">
                                                        <?php if($i_price):?>
                                                            <div class="price">
                                                                <?php echo $i_price;?>
                                                            </div><!--.price-->
                                                        <?php endif;?>
                                                        <?php if($i_web):?>
                                                            <div class="web">
                                                                <a href="http://<?php echo $i_web;?>"><?php echo $i_web;?></a>
                                                            </div><!--.web-->
                                                        <?php endif;?>
                                                    </div><!--.column-2-->
                                                </div>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div><!--.recommended-->
                                <?php endif;?>
                            </div><!--.block-->
                        <?php endforeach;?>
                    </div><!--.recommender-->
                <?php endif;?>
                <?php if(get_the_content()):?>
                    <div class="general-info">
                        <?php $general_title = get_field("general_title");
                        if($general_title):?>
                            <div class="title">
                                <?php echo $general_title;?>
                            </div><!--.title-->
                        <?php endif;?>
                        <div class="copy">
                            <?php the_content();?>
                        </div><!--.copy-->
                    </div><!--.general-info-->
                <?php endif;?>
            </div><!--.wrapper-->
        </div><!--#product-description-->
        <div class="product-gallery">
            <div class="wrapper">
                <?php $gallery = get_field('gallery');
                if($gallery):
                    foreach($gallery as $image):?>
                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                    <?php endforeach;?>
                    <div class="clear"></div>
                <?php endif;?>
            </div><!--.wrapper-->
        </div><!--.product-gallery-->
    </div><!-- .page-content-projects.template-product -->
<?php endif; ?>
<?php get_footer(); ?>