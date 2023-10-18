<?php

/**
 * Template name: projet
 * 
 */
?>
<?php get_header(); ?>
<?php
/****Requêtes SQL de WP*********************************************************/
$categorie = get_queried_object();
$args = array(
  'category_name' => 'projets',
  /* 'category_name' => 'projets,cours', */
  'orderby' => 'title',
  'order' => 'ASC',
  'post_type' => 'post',
  'posts_per_page' => -1
);
$query = new WP_Query($args);
$cat_slug =  $categorie->slug;
$categorie_modele = locate_template('template-parts/categorie-projets.php');
$acf = the_field('auteur');
?>



<!---------------------  Affichage dans WordPress********************************* -->

<!-- Entête    *** -->
<?php get_header(); ?>

<!-- Aside    ***  -->
<?php //Si c'est les catégories projets et evenements
if (!is_front_page() && (!is_admin())) {
  get_template_part("template-parts/aside");
}
?>

<main class="site_main">
  <section class="categorie__section">
    <h2>Sélection de projets</h2>
    <?php
    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post(); ?>
        
        <?php
        if (has_post_thumbnail()) { ?>
              <!--  Afficher l'image et en faire un lien clicable -->
              
              <?php if (has_post_thumbnail()) : ?>
                <article class="categorie__article"> 
              <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></h3> </a>
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
              <?php endif; ?>
        <?php
        }
      endwhile;
      wp_reset_postdata();
    else :
      echo 'Aucun article trouvé.';
    endif;
        ?>
        
  </section>
</main>

<?php get_footer(); ?>