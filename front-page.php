<?php

/**
 * Fichier pour l'affichage de la page d'accueil
 * 
 */
?>

<?php
// Image temporaire Sprint 02 / Chemin de l'image
$imagePath = "wp-content/themes/5W5-E2/images/media_vedette_test.jpg";
?>

<?php get_header(); ?>
<main class="site_main site_main_accueil">

  <section class="media_vedette">
  <div class="img-wrapper">
<!-- Image temporaire Sprint 02 -->
  <img src="<?php echo $imagePath; ?>" alt="Image vedette">
</div>
    <span>T</span>
    <span>I</span>
    <span>M</span>
  </section>

 
  <section class="accueil_evenements">
  <h4>Évènements</h4>
  <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        if (in_category('evenements')) {
          $la_categorie ='evenements';
        } 
        get_template_part('template-parts/categorie', $la_categorie); 
      endwhile;
    endif;
    ?>
  </section>

  <section class="accueil_programme">
  <h4>Inscription et étudiant d'un jour</h4>
  </section>
</main>

<?php get_footer(); ?>