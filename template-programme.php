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
        <a href="#" class="boutonInscription">Étudiant d'un jour</a>
        <a href="#" class="boutonInscription">Inscription au programme</a>
    </section>

    <?php /****** Liste de cours *******/ ?>
    <section class="Liste_programme">

        <div id="content">
            <div id="interactive-table">
                <!-- Boutons de session -->
                <div id="session-buttons">
                    <button class="session-button" data-session="session1">Session 1</button>
                    <button class="session-button" data-session="session2">Session 2</button>
                    <button class="session-button" data-session="session3">Session 3</button>
                    <button class="session-button" data-session="session4">Session 4</button>
                    <button class="session-button" data-session="session5">Session 5</button>
                    <button class="session-button" data-session="session6">Session 6</button>
                </div>

                <!-- Tableau interactif -->
                <div id="table-container">
                    <!-- Le contenu du tableau interactif sera généré par JavaScript ici -->
                </div>
                <div id="article_programme1">
                    <?php
                    $args = array(
                        'post_type' => 'post',  // Type de contenu : Article
                        'category_name' => 'session1,cours',  // Catégories/slug "session1" et "cours"
                        'category__not_in' => array(get_cat_ID('projets')),  // Exclure la catégorie/slug "projets"
                        'posts_per_page' => -1,  // Nombre illimité d'articles par page
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            // Affichez le contenu de l'article ici
                            the_title();  // Titre de l'article
                            the_content();  // Contenu de l'article
                        endwhile;
                    else :
                        // Aucun article trouvé
                        echo 'Aucun article correspondant aux critères.';
                    endif;

                    // Réinitialiser la requête WP
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>

        <div class="grille_cours">

        </div>
    </section>

    <?php /****** Carrousel profs *******/ ?>
    <section class="Profs">
        <h2>Professeurs du TIM</h2>
        <div></div><?php /****** Carrousel ext *******/ ?>
    </section>

</main>

<?php get_footer(); ?>