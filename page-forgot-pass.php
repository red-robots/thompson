<?php
/* Template Name: Forgot Password */
?>
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
                <?php the_content();?>
                <h2>Lost Password</h2>
                <form method="post" action="<?php bloginfo( 'wpurl' ); ?>/wp-login.php?action=lostpassword">
                    <label>Username or E-mail: </label><input type="text" style="margin:10px 0;" size="20" name="user_login"/><br/>
                    <input type="submit" value="Submit" name="Submit"/>
                </form>
            </div><!--#content-->
        </div><!--.page-content-->
        <div id="content-bottom">
            <img src="<?php bloginfo( 'template_url' ); ?>/images/bg-content-bottom.png" alt=""
                                      border="0">
        </div><!--.content-bottom-->
    </div><!-- .header-spacer -->
<?php endif; ?>
<?php get_footer(); ?>