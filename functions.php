<?php
/* ----------------------------------------------------------------------------- Lier les styles */
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
add_action('wp_enqueue_scripts', 'ajouter_styles' );


/* ----------------------------------------------------------------------------- Enregistrement des menus */
function enregistrement_nav_menu()
{
    register_nav_menus(array(
        'principal' => 'Menu principal',
       /* 'footer'  => 'Menu pied de page',
        'aside'  => 'Menu secondaire',*/
 ));
}
add_action('after_setup_theme', 'enregistrement_nav_menu', 0); 


/*------------------------------------------------------------------------------ add_theme_support() */
add_theme_support('title-tag');
add_theme_support(
    'custom-logo',
    array(
        'height' => 150,
        'width'  => 150,
    )
);
add_theme_support('post-thumbnails');
add_theme_support('custom-background');


/*----------------------------------------------------------------------------- Enregistrer le sidebar */

/* À utiliser dans : footer.php) */
function enregistrer_sidebar() {

    register_sidebar( array(
        'name' => __( 'Footer 1', '5W5-E2' ),
        'id' => 'footer_1',
        'description' => __( 'Une zone pour afficher des widgets dans le footer.', '5W5-E2' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer 2', '5W5-E2' ),
        'id' => 'footer_2',
        'description' => __( 'Une zone pour afficher des widgets dans le footer.', '5W5-E2' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer 3', '5W5-E2' ),
        'id' => 'footer_3',
        'description' => __( 'Une zone pour afficher des widgets dans le footer.', '5W5-E2' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );

}
add_action( 'widgets_init', 'enregistrer_sidebar' );



/*----------------------------------------------------------------------------- Modifier la requête principale */
function e2_modifie_requete_principal($query) //s'exécute à chaque page
{
    if (
        $query->is_home()
        && $query->is_main_query() //ce n'est pas une requête secondaire
        && !is_admin() // c'est pas le tableau de bord (car il y a là aussi une requête principale)
    ) {
        $query->set('category_name', 'Accueil'); //On affiche accueil sur la page principale
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}

add_action('pre_get_posts', 'e2_modifie_requete_principal'); 

/*----------------------------------------------------------------------------- Masquer nom de catégorie */



/**---------------------------------------------------------------------------- Ajouter le script.js a la page programme */

function enqueue_custom_script() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/JS/script.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_script');

function enqueue_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');

function filter_posts() {
    $session = sanitize_text_field($_POST['session']);

    // Construction des arguments de requête WP
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1, // Affichez tous les articles correspondants
        'tax_query' => array(
            'relation' => 'AND', // Utilisez une relation "ET" pour satisfaire toutes les conditions
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'cours', // L'article doit avoir le slug "cours"
            ),
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'projet', // Excluez les articles ayant le slug "projet"
                'operator' => 'NOT IN',
            ),
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'session-' . $session, // Le slug de la session sélectionnée
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Affichez ici le contenu de l'article comme vous le souhaitez
            the_title();
            the_content();
        endwhile;
    else :
        echo 'Aucun article trouvé.';
    endif;

    wp_reset_postdata();

    die();
}

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');

function add_ajax_url() {
    echo '<script type="text/javascript">
        var ajaxurl = "' . admin_url('admin-ajax.php') . '";
    </script>';
}

add_action('wp_head', 'add_ajax_url');

