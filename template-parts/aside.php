<?php
/**
 * Template part pour afficher menu secondaire selon les catégories
 */
 ?>

<aside class="site__aside">
    <?php 
    $ma_categorie = "projets";
    if (in_category('projets')) {
      $ma_categorie = "projets";
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
    )); ?>
</aside>