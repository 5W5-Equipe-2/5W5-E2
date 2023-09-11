<?php
/**
 * Template part pour afficher les évènements
 */
    $titre = get_the_title();
  ?>

<article class="">
  <?php  if(has_post_thumbnail()) {
    the_post_thumbnail('thumbnail');
   //echo get_the_ID();
  } 
else {

    echo get_the_post_thumbnail(27,'thumbnail' );
  }
?>
  <h3><a href="<?php the_permalink(); ?>"> <?= $titre ?></a></h3>
    <?php $lien = get_permalink(); ?>
    <?php $lire = "<span><a href='" . $lien . "'>... &#187;</a></span>" ?>
   <p> <?= wp_trim_words(get_the_excerpt(), 10, $lire) ?> </p>
   <?php 

if(!is_front_page()) { ?>
 <p><?= the_category(', ');?> </p>
<?php } ?>
</article>