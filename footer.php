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
<a id="retour_haut" href="#" title="Retour en haut de page" >
<svg class="fleche_pointe_top" xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="m3.293 11.293 1.414 1.414L11 6.414V20h2V6.414l6.293 6.293 1.414-1.414L12 2.586l-8.707 8.707z"/></svg>
</a>
</div>

</footer>
<?php wp_footer(); ?>
</body>

</html>