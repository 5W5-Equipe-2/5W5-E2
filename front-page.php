<?php

/**
 * Fichier pour l'affichage de la page d'accueil
 * 
 */
?>
<?php get_header(); ?>
<main class="site_main site_main_accueil">
  <section class="media_vedette">
    <div class="diaporama">
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
    <?php echo do_shortcode('[5w5e2carrousel categories="evenements" operator="ET" exclude_categories="" exclude_operator="ET" max_posts="5"]'); ?>
    </div>
  </section>

  <section class="accueil_programme">
    <?php dynamic_sidebar('inscription_accueil'); ?>
  </section>
</main>

<?php get_footer(); ?>