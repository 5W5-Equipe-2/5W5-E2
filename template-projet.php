<?php

/**
 * Template name: projet
 * 
 */

/****Requêtes SQL de WP*********************************************************/
$categorie = get_queried_object();
$args = array(
  'category_name' => 'projets',
  /* 'category_name' => 'projets,cours', */
  'orderby' => 'rand', // Ordre aléatoire
  'post_type' => 'post',
  'posts_per_page' => 6,  // Afficher 6 articles 
);
$query = new WP_Query($args);
?>

<!---------------------  Affichage dans WordPress********************************* -->

<!-- Entête    *** -->
<?php get_header(); ?>

<!-- Aside    ***  -->
<?php 
if (!is_front_page() && (!is_admin())) {
  get_template_part("template-parts/aside");
}
?>

<main class="site_main">
<section>
  <!--    On affiche ce qui est mis dans WordPress par l'utilisateur -->
  <?php the_content()?>
</section>
  <!--    Affichage des projets -->
  <section class="categorie__section">
    <?php
    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post(); 
    
    //<!--  Aller chercher champs AFC (clicable) -->
             $auteur = get_field('auteur');
               if (has_post_thumbnail() && !empty($auteur)) : ?>
                <article class="categorie__article"> 
                  <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></h3> </a>
                  <!--  Afficher l'image et en faire un lien clicable -->
                  <figure>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('thumbnail',  ['alt' => get_the_title()]); ?>
                </a>
               </figure>     
                <!--  Afficher le titre l'article (clicable) -->
                <h3><a href="<?php the_permalink(); ?>"> <?= get_the_title(); ?></a></h3>
                <!--  Afficher les informations des champs AFC (clicable) -->
                <h3><a href="<?php the_permalink(); ?>"> <?= the_field('auteur'); ?></a></h3>
                </article>
              <?php endif; 
             endwhile;
      wp_reset_postdata();
    else :
      echo 'Aucun article trouvé.';
    endif;
        ?>      
  </section>

</main>
<?php get_footer(); ?>
