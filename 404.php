<?php
/**
 * Fichier pour l'afficher de la page d'erreur
 * 
 */
?>
<?php get_header(); ?>
<main class="site_main">
<section>
<h2>Oups !</h2>
<p>La page que vous recherchez semble introuvable.</p>
<p>code d'erreur : 404</p>
<p>Voici quelques liens à la place :</p>
<!-- // Afficher la navigation principale à la place -->
<?php wp_nav_menu(array('theme_location' => 'entete')); ?>
<div>
<a href="<?php echo esc_url(home_url('/')); ?>">Retour à la page d'accueil</a>
</div>
</section>
</main>
<?php get_footer(); ?>