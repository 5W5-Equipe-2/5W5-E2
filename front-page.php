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
?>

<?php get_header(); ?>
<main class="site_main site_main_accueil">

  <section class="media_vedette">
    <div class="img-wrapper">
      <!-- Image temporaire Sprint 02 -->
      <img src="<?php echo $imagePath; ?>" alt="Image vedette">
    </div>
    <div class="reseaux_sociaux"><?php dynamic_sidebar('mv_reseau_sociaux'); ?></div>
    <span>T</span>
    <span>i</span>
    <span>M</span>
  </section>
  <section class="accueil_description">
    <?php dynamic_sidebar('description_punch'); ?>
  </section>


  <section class="accueil_evenements">
    <h4>Évènements récents</h4>
    <div class="evenements_recents">
      <?php echo do_shortcode('[5w5e2carrousel categories="evenements" operator="ET" exclude_categories="" exclude_operator="ET" max_posts="5"]'); ?>
    </div>
  </section>

  <section class="accueil_programme">
    <?php dynamic_sidebar('inscription_accueil'); ?>
  </section>
</main>

<?php get_footer(); ?>