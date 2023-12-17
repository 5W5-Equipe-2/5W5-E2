<?php

/**
 * Fichier pour l'affichage du pied de page du site
 * 
 */
?>
<footer class="site_pied_page">
  <div class="contenu_footer">

  <section class="section_footer_logo">
    <?php /* the_custom_logo(); */ dynamic_sidebar('footer_0'); ?>
  </section>

  <section class="section_footer">
    <?php dynamic_sidebar('footer_1'); ?>
  </section>

  <section class="section_footer">
    <?php dynamic_sidebar('footer_2'); ?>
  </section>

  <section class="section_footer">
    <?php dynamic_sidebar('footer_3'); ?>
  </section>

  <section class="section_footer">
    <p>© <?= date("Y") ?> Collège de Maisonneuve. Tous droits réservés. </p>
  </section>
<a id="retour_haut" href="#" title="Retour en haut de page">
</a>
</div>

</footer>
<?php wp_footer(); ?>
</body>

</html>