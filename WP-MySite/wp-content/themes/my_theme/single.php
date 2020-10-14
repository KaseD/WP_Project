<?php
get_header();?>
TXT
<article class="post-article">
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<?php the_content(); ?></br>
	<small><?php the_time( 'Y.m.d' ) ?> Автор: <b><?php the_author() ?></b></small>
</article>

<?php
get_footer();
?>
