<?php get_header('index'); ?>
    <div class="smart_slider">
		<?php
		echo do_shortcode( '[smartslider3 slider=2]' );
		?>
    </div>
<div class="body-content">
<?php
global $post;
$args = array( 'post_type' => array('post','methodical','parents','achive','workshop','teatr'),'numberposts' => -1 );
$myposts = get_posts( $args );
foreach( $myposts as $post ){ setup_postdata($post);
	?>
	<article class="post-article">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php the_content(); ?></br>
		<small><?php the_time( 'Y.m.d' ) ?> Автор: <b><?php the_author() ?></b></small>
	</article>
    <hr />
	<?php
}
wp_reset_postdata();
?>

<?php get_footer(); ?>