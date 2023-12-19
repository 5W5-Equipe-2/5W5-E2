<?php

/**
 * Template name: projet
 * 
 */

/****Requêtes SQL de WP*********************************************************/
$categorie = get_queried_object();
$args = array(
  'category_name' => 'projets',
  'orderby' => 'rand', // Ordre aléatoire
  'post_type' => 'post',
  'posts_per_page' => -1,
);
$query = new WP_Query($args);
?>

<!---------------------  Affichage dans WordPress********************************* -->

<!-- Entête    *** -->
<?php get_header(); ?>

<!-- On charge le menu Aside   ***  -->
<?php
if (!is_front_page() && (!is_admin())) {
  get_template_part("template-parts/aside");
}
?>

<main class="site_main">
  <section>
    <!--    On affiche ce qui est mis dans WordPress par l'utilisateur -->
    <?php the_content() ?>
  </section>
  <!--    Affichage des projets -->
  <section class="categorie__section">
    <?php
    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post();
        get_template_part('template-parts/categorie-projets'); // Inclure le fichier categorie-projets.php
      endwhile;
      wp_reset_postdata();
    else :
      echo 'Aucun article trouvé.';
    endif;
    ?>
  </section>
</main>
<?php get_footer(); ?>