<?php

/**
 * Template name: programme
 * 
 */
?>
<?php get_header(); ?>

<main class="site_main site_main_programme">

    <?php /****** Introduction au programme *******/ ?>
    <div class="info_programme">
    <section class="description_programme">
        <h2>À quoi s'attendre dans le programme</h2>
        <?php the_content(); ?>
    </section>

    <hr>

    <?php /****** Les Inscriptions *******/ ?>
    <section class="inscription_programme">
        <h2>Veux t'inscrire?</h2>
        <a href="https://www.cmaisonneuve.qc.ca/accueil/etudiant-dun-jour/" class="boutonInscription">Étudiant d'un jour</a>
        <a href="https://www.cmaisonneuve.qc.ca/programme/integration-multimedia/#admission_programme" class="boutonInscription">Inscription au programme</a>
    </section>
    </div>

    <hr>

    <?php /****** Liste de cours *******/
     ?>
    <section class="Liste_programme">
        <h2>Liste des cours</h2>
        <h3>Sessions</h3>
        <div class="cours_session">
        <button class="filter-button" data-session="1">1</button>
        <button class="filter-button" data-session="2">2</button>
        <button class="filter-button" data-session="3">3</button>
        <button class="filter-button" data-session="4">4</button>
        <button class="filter-button" data-session="5">5</button>
        <button class="filter-button" data-session="6">6</button>
        </div>

        <div id="content">

        </div>

        <div class="grille_cours">
            <a href="#">Grille de cours</a>
        </div>

    </section>

    <hr>

    <?php /****** Carrousel profs *******/ ?>
    <section class="Profs">
        <h2>Professeurs du TIM</h2>
        <?php echo do_shortcode('[5w5e2carrousel categories="profs" operator="ET" exclude_categories="" exclude_operator="ET" max_posts="100"]'); ?>
    </section>

</main>

<?php get_footer(); ?>