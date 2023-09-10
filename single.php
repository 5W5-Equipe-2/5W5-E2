<?php

/**
 * Modèle pour single.php
 * 
 */
?>
<?php get_header(); ?>

<main class="site_main">
  <h5> single.php</h5>
 
    <article class="">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_title('<h1 class="single_titre">', '</h1>');
          the_post_thumbnail('large');
          the_content();
        endwhile;
      endif;
      ?>
    </article>

</main>




<?php get_footer(); ?>