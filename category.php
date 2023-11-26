<?php

/**
 * Modèle category.php 
 * 
 */
?>
<?php
/****Requêtes SQL de WP*********************************************************/
$categorie = get_queried_object();
$args = array(
    'category_name' => $categorie->slug,
    'order' => ($categorie->slug === 'media') ? 'rand' : 'ASC', // Si c'est media, c'est ordre au hasard
    'orderby' => 'title',
    'posts_per_page' => -1, // Récupérer tous les articles, sans pagination
);
$query = new WP_Query($args);
$cat_slug =  $categorie->slug;

?>

<?php
/****Récupérer le nom de la catégorie à partir de l'url ************************/
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// Extrait le dernier segment de l'URL
$segments = explode('/', rtrim($url, '/'));
$cat_url = end($segments);

// Si la catégorie est un sous-enfant de la catégorie "Cours", utilisez le modèle de la catégorie "Projets"
if (is_category() && cat_is_ancestor_of(get_category_by_slug('cours')->term_id, $categorie->term_id)) {
    $categorie_modele = locate_template('template-parts/categorie-projets.php');
} else {
    // Rechercher un modèle de catégorie en fonction du slug
    $categorie_modele = locate_template('template-parts/categorie-' . $cat_slug . '.php');

    // Si un modèle n'est pas trouvé pour la catégorie actuelle, recherchez le modèle du parent
    if (empty($categorie_modele)) {
        $parent_cat = get_term_by('id',  $categorie->parent, 'category'); // Récupérer la catégorie parente

        // Tant qu'il y a une catégorie parente et que le modèle n'a pas été trouvé
        while ($parent_cat && empty($categorie_modele)) {
            $parent_slug = $parent_cat->slug;
            $categorie_modele = locate_template('template-parts/categorie-' . $parent_slug . '.php');
            $parent_cat = get_term_by('id', $parent_cat->parent, 'category'); // Récupérer la catégorie parente suivante
        }
    }
}

// Utiliser le modèle par défaut si aucun modèle personnalisé n'est pas trouvé
if (empty($categorie_modele)) {
    $categorie_modele = locate_template('template-parts/categorie-defaut.php');
}
?>

<!---------------------  Affichage dans WordPress********************************* -->

<!-- Entête    ************************ -->
<?php get_header(); ?>

<!-- Aside    *************************  -->
<?php //Si c'est les catégories evenements et projets
if (!is_front_page() && (!is_admin()) && (has_term(array('projets', 'evenements'), 'category'))) {
    get_template_part("template-parts/aside");
}
?>

<main class="site_main">
    <!--   On affiche le titre de la catégorie -->
    <?php echo '<h2 class="projet_titre">' . $categorie->name . '</h2>'; ?>

    <section class="categorie__section">
        <?php if ((str_starts_with($cat_url, 'session'))) {
            //Si c'est l'une des catégories de session ------------------------------->
            //Aller chercher les catégories enfants (les cours)
            $cours_categories = get_term_children($categorie->term_id, 'category');

            if (!empty($cours_categories)) {
                foreach ($cours_categories as $cours_categorie_id) {
                    $cours_categorie = get_term($cours_categorie_id, 'category');

                    // Récupérer le slug de la catégorie de cours
                    $cours_categorie_slug = $cours_categorie->slug;

                    // Vérifier si au moins un article de la catégorie a une image à la une
                    $args = array(
                        'category_name' => $cours_categorie_slug,
                        'post_type' => 'post',
                        'posts_per_page' => 1, // pour vérifier au moins un article
                        'meta_query' => array(
                            array(
                                'key' => '_thumbnail_id',
                                'compare' => 'EXISTS',
                            ),
                        ),
                    );
                    $a_thumbnail_image = new WP_Query($args);

                    if ($a_thumbnail_image->have_posts()) {
                        // Afficher le titre du cours si les articles ont une image
                        echo '<h3>' . substr($cours_categorie->name, 4) . '</h3>';

                        // Réinitialiser la requête pour la boucle principale
                        wp_reset_postdata();

                        // Exécuter la requête pour afficher les articles
                        $args = array(
                            'category_name' => $cours_categorie_slug,
                            'post_type' => 'post',
                            'posts_per_page' => -1, // pour afficher tous les articles
                        );
                        $cours_articles = new WP_Query($args);

                        if ($cours_articles->have_posts()) {
                            while ($cours_articles->have_posts()) {
                                $cours_articles->the_post();

                                // Charger le modèle pour la catégorie

                                if (!empty($categorie_modele)) {
                                    include($categorie_modele);
                                }
                            }
                            wp_reset_postdata(); // Réinitialiser la requête
                        }
                    }
                }
            }
        } ?>

        <?php if (!(str_starts_with($cat_url, 'session'))) {
            // Pour toutes les catégories, sauf les "sessions" ------------------------------->
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    // Charger le modèle pour la catégorie
                    if (!empty($categorie_modele)) {
                        include($categorie_modele);
                    }
                endwhile;
            endif;
            wp_reset_postdata();
        }
        ?>
    </section>
</main>

<?php get_footer(); ?>