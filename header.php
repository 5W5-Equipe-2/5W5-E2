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
      
      <input type="checkbox" id="chkMenu" value="">
      <section class="site__header__barre">
        <label class="burger" for="chkMenu">
          <span class="iconebgr">menu</span>
        </label>
      </section>
      <!-- Navigation principale (div) -->
      <?php wp_nav_menu(array(
          "menu" => "entete",
          "container" => "nav"
        )) ?>

        
        <div class="">
          <?php get_search_form(); ?>
        </div>

    </header>
 
