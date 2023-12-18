<?php

/**
 * Template part pour afficher menu secondaire selon les catégories ou page template
 */
?>

<aside id="navigation-projet" class="site__aside <?php echo (in_category('evenements') ? 'aside-ev' : ''); ?>">
  <?php
  $ma_categorie = "projets";
  if (in_category('projets') || is_page_template('template-projet.php')) {
    $ma_categorie = "projets";
  ?>
    <!-- Bouton pour filtres de la catégorie Projets / menu burger ************************  -->
    <div class="boutton-projet">
        <button class="menu_toggle_projet" aria-controls="primary-menu" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="51.63" height="27" viewBox="0 0 51.63 27">
            <g transform="translate(-36.5 -94)">
              <path d="M51.63,1.5H0v-3H51.63Z" transform="translate(36.5 99.001)" fill="#707070"/>
              <path d="M51.63,1.5H0v-3H51.63Z" transform="translate(36.5 107.574)" fill="#707070"/>
              <path d="M51.63,1.5H0v-3H51.63Z" transform="translate(36.5 116.147)" fill="#707070"/>
              <circle cx="5" cy="5" r="5" transform="translate(42 94)" fill="#fff"/>
              <path d="M5,2A3,3,0,1,0,8,5,3,3,0,0,0,5,2M5,0A5,5,0,1,1,0,5,5,5,0,0,1,5,0Z" transform="translate(42 94)" fill="#707070"/>
              <circle cx="5" cy="5" r="5" transform="translate(73 103)" fill="#fff"/>
              <path d="M5,2A3,3,0,1,0,8,5,3,3,0,0,0,5,2M5,0A5,5,0,1,1,0,5,5,5,0,0,1,5,0Z" transform="translate(73 103)" fill="#707070"/>
              <circle cx="5" cy="5" r="5" transform="translate(42 111)" fill="#fff"/>
              <path d="M5,2A3,3,0,1,0,8,5,3,3,0,0,0,5,2M5,0A5,5,0,1,1,0,5,5,5,0,0,1,5,0Z" transform="translate(42 111)" fill="#707070"/>
            </g>
          </svg>
          </button>
      </div>
    <?php
  }
  if (in_category('evenements')) {
    $ma_categorie = "evenements";
  }

  /** Création du menu selon la catégorie**/
  $menu_classe = "menu-" . $ma_categorie;

  wp_nav_menu(array(
    "menu" => $ma_categorie,
    "container" => "nav",
    "container_class" => $menu_classe
  ));
  ?>
</aside>
