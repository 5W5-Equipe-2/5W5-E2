<?php
/**
 * Modèle pour afficher les résultats de recherches
 * 
 */
?>
<?php get_header(); ?>
<main class="site_main">
<h5> search.php</h5> 

<article class="">
  <h2 class="">Résultats de la recherche</h2>
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
       $lien = get_permalink(); 
        $lire = "<a href='" . $lien . "'> [...]</a>"; ?>
        <h4><a href="<?php the_permalink(); ?>"> <?= get_the_title(); ?></a></h4>
          <?= wp_trim_words(get_the_excerpt(), 50, $lire) ?>
          <hr>
          <?php
        endwhile;
      endif;
      ?>
    </article>
    
</main>


<?php get_footer(); ?>
