<?php

/**
 * Fichier pour l'affichage de la page d'accueil
 * 
 */
?>
<?php get_header(); ?>
<main class="site_main site_main_accueil">
  <section class="media_vedette">
    <div class="img-wrapper">
    <?php
    get_template_part('template-parts/categorie-media');
    ?>
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
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          if (in_category(array('accueil', 'evenements'))) {
            get_template_part('template-parts/categorie-evenements');
          }
        endwhile;
      endif;
      ?>
    </div>
  </section>

  <section class="accueil_programme">
    <?php dynamic_sidebar('inscription_accueil'); ?>
  </section>
</main>

<?php get_footer(); ?>