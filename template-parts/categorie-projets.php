<?php
/**
 * Template part la catégorie projets
 */
    $titre = get_the_title();
  ?>
  <h1>PROJETS</h1>
<article class="">
  <?php  if(has_post_thumbnail()) {
    the_post_thumbnail('thumbnail');
  } 
?>
  <h3><a href="<?php the_permalink(); ?>"> <?= $titre ?></a></h3>
    <?php $lien = get_permalink(); ?>
    <?php $lire = "<span><a href='" . $lien . "'>... &#187;</a></span>" ?>
   <p> <?= wp_trim_words(get_the_excerpt(), 10, $lire) ?> </p>
  
</article>