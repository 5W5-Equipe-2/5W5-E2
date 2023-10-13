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
     <h1><a href="<?= bloginfo('url') ?>"><?= bloginfo('name') ?></a></h1>
      <h2><?= bloginfo('description') ?></h2>
      

        <nav id="site-navigation" class="main-navigation">
			
        <div class="boutton">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img src="https://s2.svgbox.net/illlustrations.svg?ic=burger&color=000" width="32" height="32"></button >
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
 
