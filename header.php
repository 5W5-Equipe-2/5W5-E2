<!DOCTYPE html>
<html lang="fr-ca">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body>
     <header class="site_entete">
     <h1 class="titre-header"><a href="<?= bloginfo('url') ?>"><?= bloginfo('name') ?></a></h1>
     <div class="logo-TIM">
      <a href="<?php bloginfo('url') ?>"> <?php the_custom_logo() ?></a>
    </div>
      
        <nav id="site-navigation" class="main-navigation">
			
        <div class="boutton">
            <!-- button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img src="https://s2.svgbox.net/illlustrations.svg?ic=burger&color=000" width="32" height="32"></button -->
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><svg id="Composant_10_2" data-name="Composant 10 – 2" xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 27.506 14.098"><path id="Tracé_1" data-name="Tracé 1" d="M0,0H27.443V2.08H0Z" transform="translate(0.063)" fill="#fff"/><rect id="Rectangle_10" data-name="Rectangle 10" width="27.443" height="2.08" transform="translate(0.031 6.009)" fill="#fff"/><path id="Tracé_2" data-name="Tracé 2" d="M0,0H27.443V2.08H0Z" transform="translate(0 12.018)" fill="#fff"/></svg></button >

        </div>

        <div class="site__header__recherche">
          <?php get_search_form(); ?>
        </div> 

			<?php wp_nav_menu(array(
          "menu" => "entete",
          "container" => "nav"
        ))
         ?>


		</nav><!-- #site-navigation -->

    
      </section>
      <!-- Navigation principale (div) -->


      

    </header>
 
