<?php

/**
 * Fichier pour l'affichage de la page d'accueil
 * 
 */
?>

<?php
// Chemin de l'image
$imagePath = "wp-content/themes/5W5-E2/images/media_vedette_test.jpg";
$imagePath2 = "wp-content/themes/5W5-E2/images/media_vedette_test2.jpg";
$imagePath3 = "wp-content/themes/5W5-E2/images/media_vedette_test3.jpg";
$imagePath4 = "wp-content/themes/5W5-E2/images/media_vedette_test4.png";
?>

<?php get_header(); ?>
<main class="site_main site_main_accueil">

  <section class="media_vedette">
  <div class="img-wrapper">
  <!-- The `::before` pseudo-element will apear here in the Broweser(DOM) and in web-inspector. -->
  <img src="<?php echo $imagePath; ?>" alt="Image vedette">
</div>
    <h3>Media Vedette</h3>

  </section>

  <section class="media_vedette">
<div class="img-wrapper img-wrapper-2">
<!-- The `::before` pseudo-element will apear here in the Broweser(DOM) and in web-inspector. -->
<img src="<?php echo $imagePath2; ?>" alt="Image vedette">
</div>
  <h3>Media Vedette test 2</h3>
</section>

<section class="media_vedette">
<div class="img-wrapper">
<!-- The `::before` pseudo-element will apear here in the Broweser(DOM) and in web-inspector. -->
<img src="<?php echo $imagePath3; ?>" alt="Image vedette">
</div>
  <h3>Media Vedette test 3</h3>
</section>

<section class="media_vedette">
<div class="img-wrapper img-wrapper-2">
<!-- The `::before` pseudo-element will apear here in the Broweser(DOM) and in web-inspector. -->
<img src="<?php echo $imagePath4; ?>" alt="Image vedette">
</div>
  <h3>Media Vedette test 4</h3>
</section>

  <section class="accueil_description">
    <h4>Courte description du programme / Phrase punch</h4>
  </section>

  <section class="accueil_evenements">
  <h4>Évènements</h4>
  <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        if (in_category('evenements')) {
          $la_categorie ='evenements';
        } 
        get_template_part('template-parts/categorie', $la_categorie); 
      endwhile;
    endif;
    ?>
  </section>

  <section class="accueil_programme">
  <h4>Inscription et étudiant d'un jour</h4>
  </section>
</main>

<?php get_footer(); ?>