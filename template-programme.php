<?php

/**
 * Template name: programme
 * 
 */
?>
<?php get_header(); ?>

<main class="site_main site_main_programme">

    <?php /****** Introduction au programme *******/ ?>
    <section class="description_programme">
        <h2>À quoi s'attendre dans le programme</h2>
        <p>
            Le programme d'intégration multimédia au Collège de Maisonneuve offre une expérience éducative exceptionnelle axée sur la collaboration,
            le développement web et la création de jeux vidéo. Notre programme est conçu pour encourager les étudiants à travailler en équipe,
            à développer des projets multimédias innovants et à acquérir des compétences essentielles pour l'industrie.
            Notre programme offre une combinaison unique de compétences techniques, créatives et conceptuelles,
            permettant aux étudiants de maîtriser des outils essentiels tels que la conception graphique, la vidéo, l'animation, la programmation et bien plus encore.
            Les étudiants sont immergés dans un environnement stimulant où ils apprennent à concevoir des sites web captivants,
            à développer des applications interactives et à créer des jeux vidéo passionnants. Le travail d'équipe est au cœur de notre approche pédagogique,
            car nous croyons que la collaboration est essentielle pour réussir dans le monde dynamique des médias numériques.
            Nos enseignants expérimentés guident les étudiants à travers des projets concrets,
            les aidant à maîtriser les compétences techniques et créatives nécessaires pour exceller dans l'industrie en constante évolution.
        </p>
    </section>

    <?php /****** Les Inscriptions *******/ ?>
    <section class="inscription_programme">
        <h2>Veux t'inscrire?</h2>
        <a href="https://www.cmaisonneuve.qc.ca/accueil/etudiant-dun-jour/" class="boutonInscription">Étudiant d'un jour</a>
        <a href="https://www.cmaisonneuve.qc.ca/programme/integration-multimedia/#admission_programme" class="boutonInscription">Inscription au programme</a>
    </section>

    <?php /****** Liste de cours *******/ ?>
    <section class="Liste_programme">
        <h2>Liste des cours</h2>
        <button class="filter-button" data-session="1">Session 1</button>
        <button class="filter-button" data-session="2">Session 2</button>
        <button class="filter-button" data-session="3">Session 3</button>
        <button class="filter-button" data-session="4">Session 4</button>
        <button class="filter-button" data-session="5">Session 5</button>
        <button class="filter-button" data-session="6">Session 6</button>

        <div id="content">

        </div>

        <div class="grille_cours">
            <a href="#">Grille de cours</a>
        </div>

    </section>

    <?php /****** Carrousel profs *******/ ?>
    <section class="Profs">
        <h2>Professeurs du TIM</h2>
        <?php echo do_shortcode('[5w5e2carrousel categories="cours,1j1" operator="ET" exclude_categories="-projet" exclude_operator="ET" max_posts="100"]'); ?>
    </section>

</main>

<?php get_footer(); ?>