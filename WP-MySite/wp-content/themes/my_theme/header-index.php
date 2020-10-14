<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title><?php bloginfo( 'name' );?></title>
	<meta name="description" content="">
	<meta name="author" content="Кашанський Денис">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php get_template_directory_uri()?>/favicon.ico" > 

	<?php wp_head();?>

</head>

<body>

   <!-- Header
   ================================================== -->
   <header>

      <div class="row">

         <div class="twelve columns">
            <nav id="nav-wrap">

               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	           <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

               <?php wp_nav_menu( array( 
               		'theme_location' => 'top',
               		'container' => null,
               		'menu_class' => 'nav',
               		'menu_id' => 'nav',
               		
               ) );?>

            </nav> <!-- end #nav-wrap -->

         </div>

      </div>

   </header> <!-- Header End -->