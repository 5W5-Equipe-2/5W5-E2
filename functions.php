<?php
/* ----------------------------------------------------------------------------- Lier les styles */

if (!defined('_S_VERSION')) {
    // Remplacer le numéro de la version à chaque publication.
    define('_S_VERSION', '1.0.0');
}

function ajouter_styles()
{

    wp_enqueue_style(
        'style-principale',
        get_template_directory_uri() . '/style.css',
        array(),
        filemtime(get_template_directory() . '/style.css')
    );

    /* Intégration des polices de Google */
    wp_enqueue_style('style-goolefont', 'https://fonts.googleapis.com/css2?family=DM+Sans:opsz@9..40&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet', false);
}
add_action('wp_enqueue_scripts', 'ajouter_styles');


/* ----------------------------------------------------------------------------- Enregistrement des menus */
function enregistrement_nav_menu()
{
    register_nav_menus(array(
        'entete' => 'Menu entete',
        'evt' => 'Menu évènement',
        'projets' => 'Menu projets',
    ));
}
add_action('init', 'enregistrement_nav_menu', 0);


/*------------------------------------------------------------------------------ add_theme_support() */
add_theme_support('title-tag');
add_theme_support(
    'custom-logo',
    array(
        'height' => 50,
        'width'  => 50,
    )
);
add_theme_support('post-thumbnails');
add_theme_support('custom-background');


/*------------------------------------------------------------------------------ Enregistrer le sidebar */
/****** 
 Widgets de la page d'accueil et du footer 
 **********************************/
function enregistrer_sidebar()
{
    register_sidebar(array(
        'name' => __('Reseau sociaux', '5W5-E2'),
        'id' => 'mv_reseau_sociaux',
        'description' => __('Une zone pour afficher des widgets dans le media vedette.', '5W5-E2'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Sous-titre', '5W5-E2'),
        'id' => 'mv_nom_techniques',
        'description' => __('Une zone pour afficher les sous-titres dans le media vedette.', '5W5-E2'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Description', '5W5-E2'),
        'id' => 'description_punch',
        'description' => __('Une zone pour afficher la description/phrase punch', '5W5-E2'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Inscription', '5W5-E2'),
        'id' => 'inscription_accueil',
        'description' => __('Une zone pour afficher des widgets dans le media vedette.', '5W5-E2'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Footer Logo', '5W5-E2'),
        'id' => 'footer_0',
        'description' => __('Une zone pour afficher des widgets dans le footer.', '5W5-E2'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Footer 1', '5W5-E2'),
        'id' => 'footer_1',
        'description' => __('Une zone pour afficher des widgets dans le footer.', '5W5-E2'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 2', '5W5-E2'),
        'id' => 'footer_2',
        'description' => __('Une zone pour afficher des widgets dans le footer.', '5W5-E2'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 3', '5W5-E2'),
        'id' => 'footer_3',
        'description' => __('Une zone pour afficher des widgets dans le footer.', '5W5-E2'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'enregistrer_sidebar');



/*----------------------------------------------------------------------------- Modifier la requête principale */
function e2_modifie_requete_principal($query) {
    if (
        $query->is_home() && // Sur la page d'accueil
        $query->is_main_query() && // Ce n'est pas une requête secondaire
        !is_admin() // Pas dans le tableau de bord
    ) {
        // Slugs des catégories à afficher sur la page d'accueil 
        $category_slugs_to_show = 'accueil, media';

        $query->set('category_name', $category_slugs_to_show);
        $query->set('orderby', 'title');

        // Vérifier si la catégorie est "media" pour définir l'ordre sur rand (aléatoire)
        if ( is_category('media') ) {
            $query->set('order', 'RAND');
        } else {
            $query->set('order', 'ASC');
        }

        // Ajouter une condition pour ne pas affecter la requête sur la page front-page.php
        if ( ! is_front_page() ) {
            $query->set('posts_per_page', -1); // Récupérer tous les articles
        }
    }
}

add_action('pre_get_posts', 'e2_modifie_requete_principal');


/*-----------------------------------------------------------------------------ajouter le script pour la navigation header */
function theme5w5_scripts()
{

    wp_enqueue_script('theme5w5-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'theme5w5_scripts');


/**---------------------------------------------------------------------------- Ajouter le script.js à la page programme */

function enqueue_custom_script()
{
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');


/**---------------------------------------------------------------------------- Ajouter url ajax */
function add_ajax_url()
{
    echo '<script type="text/javascript">
        var ajaxurl = "' . admin_url('admin-ajax.php') . '";
    </script>';
}
/**---------------------------------------------------------------------------- Ajouter url ajax au head */

add_action('wp_head', 'add_ajax_url');
function enqueue_jquery()
{
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');

/**---------------------------------------------------------------------------- filtrer les posts programme */

function filter_posts()
{
    $session = sanitize_text_field($_POST['session']);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1, // Affichez tous les articles correspondants
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'cours',
            ),
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'projets',
                'operator' => 'NOT IN',
            ),
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'session' . $session,
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Récupérez les données de l'article
            $article_id = get_the_ID();
            $article_title = get_the_title();
            $article_content = get_the_content();
            $article_category = get_the_category(); // Récupérez la catégorie de l'article en tableau

            // Générez un bouton pour chaque article
            echo '<button class="article-button" data-article-id="' . $article_id . '">' . $article_title . '</button>';

            // Générez un conteneur pour le contenu de l'article
            echo '<div id="article-content-' . $article_id . '" class="article-content" style="display:none;">' . 
            '<button type="button" onclick="hide_decription_cours()" class="boutton_retour">Retour</button>' . 
            '<p>' . $article_content . '</p>';
            // Récupérez les articles ayant la même catégorie que le slug du titre de l'article actuel
            $related_articles_args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'category_name' => $article_category[0]->slug, // Utilisez la catégorie pour correspondre
                'post__not_in' => array($article_id), // Excluez l'article actuel
            );

            $related_articles_query = new WP_Query($related_articles_args);

            echo '<div class="related-projets">';

            // Générez un lien vers la catégorie
         $category_url = '/category/' . $article_category[0]->slug;
         echo '<a href="' . esc_url($category_url) . '">Voir plus de projets réalisés en : ' . $article_title . '.</a>';

            if ($related_articles_query->have_posts()) :
                echo '<div class="related-articles">';
                while ($related_articles_query->have_posts()) : $related_articles_query->the_post();
                    // Récupérez la feature image (à la une) de l'article
                    $thumbnail_url = get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                    if ($thumbnail_url) {
                        // Générez un lien vers l'article correspondant
                        $article_permalink = get_permalink();
                        echo '<a href="' . esc_url($article_permalink) . '">' . $thumbnail_url . '</a>';
                    }
                endwhile;
                echo '</div>';
            endif;

            echo '</div>';

            echo '</div>'; // Fermez le conteneur du contenu de l'article
        endwhile;
    else :
        echo 'Aucun article trouvé.';
    endif;

    wp_reset_postdata();

    die();
}
add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');


/**---------------------------------------------------------------------------- Afficher le contenu des articles */
function get_article_content()
{
    $article_id = intval($_POST['article_id']);
    $article_content = get_post_field('post_content', $article_id);
    $article_title = get_post_field('post_title', $article_id);

    echo $article_title;
    echo $article_content;
    die();
}
add_action('wp_ajax_get_article_content', 'get_article_content');
add_action('wp_ajax_nopriv_get_article_content', 'get_article_content');


/*****************Bouton retour de single.php ******************************************/
function store_reference_url() {
    session_start();
    $_SESSION['reference_url'] = wp_get_referer();
}
add_action('wp', 'store_reference_url');