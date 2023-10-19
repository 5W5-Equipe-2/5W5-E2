<?php
/* ----------------------------------------------------------------------------- Lier les styles */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
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
        'height' => 50,
        'width'  => 50,
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

function theme5w5_scripts() {

    wp_enqueue_script( 'theme454-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'theme5w5_scripts' );