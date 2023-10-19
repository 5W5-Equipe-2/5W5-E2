<?php

/**
 * Fichier pour l'affichage du pied de page du site
 * 
 */
?>
<footer class="site_pied_page">

  <section>
    <?php the_custom_logo(); ?>
  </section>
  
  <section>
    <?php dynamic_sidebar('footer_1'); ?>
  </section>

  <section>
    <?php dynamic_sidebar('footer_2'); ?>
  </section>

  <section>
    <?php dynamic_sidebar('footer_3'); ?>
  </section>

  <section>
    <p>© <?= date("Y") ?> Collège de Maisonneuve. Tous droits réservés. </p>
  </section>

</footer>
<?php wp_footer(); ?>
</body>

</html>