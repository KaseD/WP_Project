<?php
/*
 * Template name: Шаблон для страницы классов
 * Template type: page
 */
get_header();
$cat_name = '';
if(explode('/',get_the_permalink())[4] == "first-class"){
	$cat_name = "class-1";
}
else if(explode('/',get_the_permalink())[4] == "second-class"){
	$cat_name = "class-2";
}
else if(explode('/',get_the_permalink())[4] == "third-class"){
	$cat_name = "class-3";
}
else if(explode('/',get_the_permalink())[4] == "fourth-class"){
	$cat_name = "class-4";
}
?>

<!--Спойлеры-->

<?php
//Спойлер дидактичн
global $post;
$args = array( 'post_type' => 'methodical','numberposts' => -1,'category_name' => $cat_name );
$myposts = get_posts( $args );
?>
<details>
    <summary>Дидактичні</summary>

	<?php
	foreach( $myposts as $post ){ setup_postdata($post);
		$terms_arr = get_the_terms( get_the_ID(), "metTax" );
		if( is_array( $terms_arr ) ){
			foreach( $terms_arr as $cur_term ){
				if($cur_term->slug == "didactic"):?>
                    <article class="post-article">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<?php the_content(); ?></br>
                        <small><?php the_time( 'Y.m.d' ) ?> Автор: <b><?php the_author() ?></b></small>
                    </article>
                    <hr />
				<?php endif;
			}
		}?>

		<?php
	}
	wp_reset_postdata();
	?>
</details>
<br />

<?php
//Спойлер конспекти
global $post;
$args = array( 'post_type' => 'methodical','numberposts' => -1,'category_name' => $cat_name );
$myposts = get_posts( $args );
?>
<details>
    <summary>Конспекти</summary>

<?php
foreach( $myposts as $post ){ setup_postdata($post);
    $terms_arr = get_the_terms( get_the_ID(), "metTax" );
    if( is_array( $terms_arr ) ){
        foreach( $terms_arr as $cur_term ){
            if($cur_term->slug == "conspects"):?>
                <article class="post-article">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		            <?php the_content(); ?></br>
                    <small><?php the_time( 'Y.m.d' ) ?> Автор: <b><?php the_author() ?></b></small>
                </article>
                <hr />
            <?php endif;
        }
    }?>

    <?php
}
wp_reset_postdata();
?>
</details>
<br />

<?php
//Спойлер презентац
global $post;
$args = array( 'post_type' => 'methodical','numberposts' => -1,'category_name' => $cat_name );
$myposts = get_posts( $args );
?>
<details>
    <summary>Презентації</summary>

	<?php
	foreach( $myposts as $post ){ setup_postdata($post);
		$terms_arr = get_the_terms( get_the_ID(), "metTax" );
		if( is_array( $terms_arr ) ){
			foreach( $terms_arr as $cur_term ){
				if($cur_term->slug == "presents"):?>
                    <article class="post-article">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<?php the_content(); ?></br>
                        <small><?php the_time( 'Y.m.d' ) ?> Автор: <b><?php the_author() ?></b></small>
                    </article>
                    <hr />
				<?php endif;
			}
		}?>

		<?php
	}
	wp_reset_postdata();
	?>
</details>
<br />

<?php
//Спойлер календарне
global $post;
$args = array( 'post_type' => 'methodical','numberposts' => -1,'category_name' => $cat_name );
$myposts = get_posts( $args );
?>
<details>
    <summary>Календарне</summary>

	<?php
	foreach( $myposts as $post ){ setup_postdata($post);
		$terms_arr = get_the_terms( get_the_ID(), "metTax" );
		if( is_array( $terms_arr ) ){
			foreach( $terms_arr as $cur_term ){
				if($cur_term->slug == "calendarn"):?>
                    <article class="post-article">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<?php the_content(); ?></br>
                        <small><?php the_time( 'Y.m.d' ) ?> Автор: <b><?php the_author() ?></b></small>
                    </article>
                    <hr />
				<?php endif;
			}
		}?>

		<?php
	}
	wp_reset_postdata();
	?>
</details>
<br />

<?php
get_footer();
?>
