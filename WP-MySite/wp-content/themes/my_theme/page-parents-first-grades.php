<?php
get_header();
?>

<?php
global $post;
$args = array( 'post_type' => 'parents','numberposts' => -1,'category_name' => 'parents-grades' );
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);?>
    <article class="post-article">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php the_content(); ?></br>
        <small><?php the_time( 'Y.m.d' ) ?> Автор: <b><?php the_author() ?></b></small>
    </article>
    <hr />
<?php }
wp_reset_postdata();
?>

<?php
get_footer();
?>
