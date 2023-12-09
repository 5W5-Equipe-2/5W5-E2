<?php
/**
 * Fichier pour l'afficher de la page d'erreur
 * 
 */
?>
<?php get_header(); ?>
<main class="site_main erreur">
<section>
    <h1>Oups !</h1>
    <div class="contenant_infos">
        <div class="description">
            <h3>La page que vous recherchez semble introuvable.</h3>
            <p>code d'erreur : 404</p>
        </div>
        <div class="liens">
            <h3>Voici quelques liens à la place :</h3>
            <!-- // Afficher la navigation principale -->
            <?php wp_nav_menu(array('theme_location' => 'entete')); ?>
    </div>
    </div>
        <div class="bouton_retour">
        <h4><a href="<?php echo esc_url(home_url('/')); ?>">Retour à la page d'accueil</a></h4>
    </div>
    
    
</section>
</main>
<?php get_footer(); ?>