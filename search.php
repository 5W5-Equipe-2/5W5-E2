<?php
/**
 * Modèle pour afficher les résultats de recherches
 * 
 */
?>
<?php get_header(); ?>
<main class="site_main">
<article class="contenant_resultat_recherche">
  <h2 class="titre">Résultats de la recherche</h2>
  <hr>
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
       $lien = get_permalink(); 
        $lire = "<a href='" . $lien . "'> [...]</a>"; ?>
        <div class="resultat_recherche">
          <h4><a href="<?php the_permalink(); ?>"> <?= get_the_title(); ?></a></h4>
          <p><?= wp_trim_words(get_the_excerpt(), 50, $lire) ?></p>
          <hr>
        </div>
        <?php
        endwhile;
      endif;
      ?>
    </article>
    
</main>


<?php get_footer(); ?>
