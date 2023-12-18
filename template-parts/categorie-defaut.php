<?php
/**
 * Template part pour affichage par défaut s'il n'y a pas de template part au nom d'une catégorie
 */
    $titre = get_the_title();
  ?>
<article class="categorie__article">
  <?php  if(has_post_thumbnail()) {
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '">';
  } 
?>
  <h3><a href="<?php the_permalink(); ?>"> <?= $titre ?></a></h3>
    <?php $lien = get_permalink(); ?>
    <?php $lire = "<span><a href='" . $lien . "'>... &#187;</a></span>" ?>
   <p> <?= wp_trim_words(get_the_excerpt(), 10, $lire) ?> </p>
  
</article>