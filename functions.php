<?php

function ajouter_styles()
{

    wp_enqueue_style(
        'style-principale',  // identificateur du link css
        get_template_directory_uri() . '/style.css',  // enroit où se trouve le fichier style.css
        array(), // les fichiers css qui dépendent de style.css
        filemtime(get_template_directory() . '/style.css')  // version de notre style.css
    );

    /* Intégration des polices de Google */
//wp_enqueue_style('style-goolefont', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', false);

}
add_action('wp_enqueue_scripts', 'ajouter_styles' );


/* ----------------------------------------------------------------------------- Enregistrement des menus */
/* function enregistrement_nav_menu()
{
    register_nav_menus(array(
        'principal' => 'Menu principal',
       /* 'footer'  => 'Menu pied de page',
        'aside'  => 'Menu secondaire',*/
 /*   ));
}
add_action('after_setup_theme', 'enregistrement_nav_menu', 0); */


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