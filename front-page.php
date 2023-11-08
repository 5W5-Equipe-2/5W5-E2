<?php

/**
 * Fichier pour l'affichage de la page d'accueil
 * 
 */
?>

<?php
// Image temporaire Sprint 02 / Chemin de l'image
// $imagePath = "wp-content/themes/5W5-E2/images/media_vedette_test.jpg";

$imagePath =  get_template_directory_uri() . '/images/media_vedette_test.jpg';
$imagePathT =  get_template_directory_uri() . '/images/logo_t.png';
$imagePathM =  get_template_directory_uri() . '/images/logo_m.png';
?>

<?php get_header(); ?>
<main class="site_main site_main_accueil">
  <section class="media_vedette">

    <div class="diaporama">
      <?php
      /*Ajouter condition si extension active...*/
      echo do_shortcode('[diaporama]'); // Charger le shortcode du diaporama
      /*  if (function_exists('creation_diaporama_shortcode')) {
          echo do_shortcode('[diaporama]'); // Charger le shortcode du diaporama
        }*/
      get_template_part('template-parts/categorie-media');
      ?>
    </div>

    <div class="reseaux_sociaux"><?php dynamic_sidebar('mv_reseau_sociaux'); ?></div>
    <div class="logo_tim">
      <span><img src="<?php echo $imagePathT; ?>" alt="Ti"></span>
      <span><img src="<?php echo $imagePathM; ?>" alt="M"></span>
    </div>
    <div class="sous_titre"><?php dynamic_sidebar('mv_nom_techniques'); ?></div>
    <div class="fleche"></div>
  </section>
  <section class="accueil_description">
    <?php dynamic_sidebar('description_punch'); ?>
  </section>


  <section class="accueil_evenements">
    <h2>Évènements récents</h2>
    <div class="evenements_recents">
      <?php echo do_shortcode('[5w5e2carrousel categories="evenements" operator="ET" exclude_categories="" exclude_operator="ET" max_posts="5"]'); ?>
    </div>
  </section>

  <section class="accueil_programme">
    <?php dynamic_sidebar('inscription_accueil'); ?>
  </section>
</main>

<?php get_footer(); ?>