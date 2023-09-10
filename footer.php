<?php

/**
 * Fichier pour l'affichage du pied de page du site
 * 
 */
?>
<footer class="site_pied_page">


  <section class="sidebar">
    <p>Sidebar 1</p>
    <?php dynamic_sidebar('footer_1'); ?>
  </section>

  <section class="sidebar">
    <p>Sidebar 2</p>
    <?php dynamic_sidebar('footer_2'); ?>
  </section>


  <section class="sidebar">
    <p>Sidebar 3</p>
    <?php dynamic_sidebar('footer_3'); ?>
  </section>

  <p>© <?= date("Y") ?> Collège de Maisonneuve. Tous droits réservés. </p>


</footer>
<?php wp_footer(); ?>
</body>

</html>