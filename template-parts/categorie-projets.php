<?php

/**
 * Template part la catégorie projets
 */
$auteur = wp_trim_words(get_field('auteur'), 5);

// Couper et ajouter des points de suspension si plus de 5 mots
if (str_word_count($auteur) > 5) {
    $auteur = wp_trim_words($auteur, 5, ' ...');
}
?>

<?php
if (has_post_thumbnail() && !empty($auteur)) : ?>
    <article class="categorie__article">
        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a></h3>
        <!--  Afficher l'image et en faire un lien clicable -->
        <figure>
            <a href="<?php the_permalink(); ?>">
            <?php
                                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                        echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '">';
                                        ?>
            </a>
        </figure>
        <!--  Afficher le titre l'article (clicable) -->
        <h3><a href="<?php the_permalink(); ?>"><i><?= get_the_title(); ?></i></a></h3>
        <!--  Afficher les informations des champs AFC (clicable) -->
        <h3><a href="<?php the_permalink(); ?>"> <?=$auteur ?></a></h3>
    </article>
<?php endif; ?>
