<?php

/**
 * Fichier pour l'affichage de la page de programme
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


    <!-- Boutons de session -->
    <button id="session1Button">Session 1</button>
    <button id="session2Button">Session 2</button>
    
                <!-- Tableau des cours -->
    <table>
        <thead>
            <tr>
                <th>Session</th>
                <th>Cours</th>
            </tr>
        </thead>
        <tbody>
            <tr class="session1 course">
                <td>Session 1</td>
                <td>Cours 1.1</td>
            </tr>
            <tr class="session1 course">
                <td>Session 1</td>
                <td>Cours 1.2</td>
            </tr>
            <tr class="session2 course">
                <td>Session 2</td>
                <td>Cours 2.1</td>
            </tr>
            <tr class="session2 course">
                <td>Session 2</td>
                <td>Cours 2.2</td>
            </tr>
        </tbody>
    </table>





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