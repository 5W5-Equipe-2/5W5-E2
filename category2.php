<?php
/**
 * Modèle category.php 
 */
?>

<?php
// Requêtes SQL de WP
$categorie = get_queried_object();
$args = array(
    'category_name' => $categorie->slug,
    'order' => ($categorie->slug === 'media') ? 'rand' : 'ASC',
    'orderby' => 'title',
    'posts_per_page' => -1,
);
$query = new WP_Query($args);
$cat_slug = $categorie->slug;

// Fonction pour vérifier l'existence d'un modèle pour une catégorie
function get_category_template($category_slug)
{
    $template = locate_template('template-parts/categorie-' . $category_slug . '.php');
    return !empty($template) ? $template : false;
}

// Si la catégorie est un sous-enfant de la catégorie "Cours", utilisez le modèle de la catégorie "Projets"
if (is_category() && cat_is_ancestor_of(get_category_by_slug('cours')->term_id, $categorie->term_id)) {
    $categorie_modele = locate_template('template-parts/categorie-projets.php');
} else {
    // Rechercher un modèle de catégorie en fonction du slug
    $categorie_modele = get_category_template($cat_slug);

    // Si un modèle n'est pas trouvé pour la catégorie actuelle, recherchez le modèle du parent
    if (empty($categorie_modele)) {
        $parent_cat = get_term_by('id',  $categorie->parent, 'category');

        while ($parent_cat && empty($categorie_modele)) {
            $parent_slug = $parent_cat->slug;
            $categorie_modele = get_category_template($parent_slug);
            $parent_cat = get_term_by('id', $parent_cat->parent, 'category');
        }
    }
}

// Utiliser le modèle par défaut si aucun modèle personnalisé n'est pas trouvé
if (empty($categorie_modele)) {
    $categorie_modele = get_category_template('defaut');
}
?>

<!---------------------  Affichage dans WordPress********************************* -->

<!-- Entête ************************ -->
<?php get_header(); ?>

<!-- Aside *************************  -->
<?php
// Si ce sont les catégories evenements et projets
if (!is_front_page() && !is_admin() && has_term(array('projets', 'evenements'), 'category')) {
    get_template_part("template-parts/aside");
}
?>

<main class="site_main">
    <!-- On affiche le titre de la catégorie -->
    <?php echo '<h2 class="projet_titre">' . $categorie->name . '</h2>'; ?>

    <section class="categorie__section">
        <?php
        if (str_starts_with($cat_slug, 'session')) {
            // Si c'est l'une des catégories de session
            $cours_categories = get_term_children($categorie->term_id, 'category');

            foreach ($cours_categories as $cours_categorie_id) {
                $cours_categorie = get_term($cours_categorie_id, 'category');
                $cours_categorie_slug = $cours_categorie->slug;

                $args = array(
                    'category_name' => $cours_categorie_slug,
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'compare' => 'EXISTS',
                        ),
                    ),
                );

                $a_thumbnail_image = new WP_Query($args);

                if ($a_thumbnail_image->have_posts()) {
                    echo '<h3>' . substr($cours_categorie->name, 4) . '</h3>';
                    wp_reset_postdata();

                    $args = array(
                        'category_name' => $cours_categorie_slug,
                        'post_type' => 'post',
                        'posts_per_page' => -1,
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
                        wp_reset_postdata();
                    }
                }
            }
        } else {
            // Pour toutes les catégories, sauf les "sessions"
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
