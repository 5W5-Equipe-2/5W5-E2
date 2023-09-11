<?php

/**
 * Fichier pour l'affichage de la page d'accueil
 * 
 */
?>
<?php get_header(); ?>
<main class="site_main site_main_accueil">

  <section class="media_vedette">
    <h3>Media Vedette</h3>
  </section>

  <section class="accueil_description">
    <h4>Courte description du programme / Phrase punch</h4>
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