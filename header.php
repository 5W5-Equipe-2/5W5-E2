<!DOCTYPE html>
<html lang="fr-ca">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body>
     <header class="site_header">
     <h1><a href="<?= bloginfo('url') ?>"><?= bloginfo('name') ?></a></h1>
      <h2><?= bloginfo('description') ?></h2>


        <input type="checkbox" id="chkMenu" value="">

      <section class="site__header__barre">
        <label class="burger" for="chkMenu">
          <span class="iconebgr">menu</span>
        </label>
      </section>

      <section class="site__menu">

        <div class="site__header__recherche">
          <?php get_search_form(); ?>
        </div>

        <!--div class="site__header__titre">
          <?php the_custom_logo() ?>
          <h1><a href="<?= bloginfo('url') ?>"><?= bloginfo('name') ?></a></h1>
          <h2><?= bloginfo('description') ?></h2>
        </div -->

        <!-- Navigation principale (div) -->
        <nav id="site-navigation" class="main-navigation">
        <?php wp_nav_menu(array(
          "menu" => "entete",
          "container" => "nav"
        )) ?>
        </nav>
      </section>

        

    </header>
 
