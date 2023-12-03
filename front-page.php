<?php

/**
 * Fichier pour l'affichage de la page d'accueil
 * 
 */

/****Requêtes pour la catégorie media (et extension Diaporama) *****************/

$args = array(
    'category_name' => 'media',
    'posts_per_page' => -1, 
);
$query = new WP_Query($args);

// Récupérer les résultats de la requête
$posts = $query->get_posts();

// Mélanger l'ordre des articles pour avoir les images de mise en avant au hasard
shuffle($posts);
?>

<?php
$imagePath =  get_template_directory_uri() . '/images/media_vedette_test.jpg'; 
$imagePathT =  get_template_directory_uri() . '/images/logo_t.png';
$imagePathM =  get_template_directory_uri() . '/images/logo_m.png';


/****Affichage dans WordPress *********************************************************/

get_header(); ?>
<main class="site_main site_main_accueil">
  <!-- Section du média vedette / extendion Diaporama -->
  <section class="media_vedette">
    <div class="diaporama masquer-image">
    <?php
    // Vérifier s'il y a des articles après le shuffle
    if ($posts) :
      // Utiliser la boucle pour afficher les articles dans l'ordre au hasard
      foreach ($posts as $post) :
        setup_postdata($post);
        get_template_part('template-parts/categorie-media'); //charger le modèle
      endforeach;
    else :
      // S'il n'y a pas d'article après le mélange, afficher l'image de remplacement
      $imagePath = get_template_directory_uri() . '/images/media_vedette_test.jpg';
      ?>
      <img src="<?php echo $imagePath; ?>" alt="Image vedette">
    <?php endif;

    /*Charger l'extension du Diaporama */
    echo do_shortcode('[diaporama]');
    ?>
    </div>
    <div class="reseaux_sociaux"><?php dynamic_sidebar('mv_reseau_sociaux'); ?></div>
    <div class="logo_tim">
      <span><img src="<?php echo $imagePathT; ?>" alt="Ti"></span>
      <span><img src="<?php echo $imagePathM; ?>" alt="M"></span>
    </div>
    <div class="sous_titre"><?php dynamic_sidebar('mv_nom_techniques'); ?></div>
    <a href="#sous_titre"><div class="fleche"></div></a>
  </section>
<!-- Section du sous-titre / widget -->
  <section id="sous_titre" class="accueil_description">
    <?php dynamic_sidebar('description_punch'); ?>
  </section>
<!-- Section des évènements récents -->
  <section class="accueil_evenements">
    <h2>Évènements récents</h2>
    <div class="evenements_recents">
      <?php echo do_shortcode('[5w5e2carrousel categories="evenements" operator="ET" exclude_categories="" exclude_operator="ET" max_posts="5"]'); ?>
    </div>
  </section>
<!-- Section d'information / widget'-->
  <section class="accueil_programme">
    <?php dynamic_sidebar('inscription_accueil'); ?>
  </section>
</main>

<?php get_footer(); ?>