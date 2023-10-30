<?php

/**
 * Template part la catégorie projets
 */
$titre = get_the_title();
$auteur = get_field('auteur');
?>

<?php
if (has_post_thumbnail() && !empty($auteur)) : ?>
    <article class="categorie__article">
        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></h3> </a>
        <!--  Afficher l'image et en faire un lien clicable -->
        <figure>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail',  ['alt' => get_the_title()]); ?>
            </a>
        </figure>
        <!--  Afficher le titre l'article (clicable) -->
        <h3><a href="<?php the_permalink(); ?>"> <?= get_the_title(); ?></a></h3>
        <!--  Afficher les informations des champs AFC (clicable) -->
        <h3><a href="<?php the_permalink(); ?>"> <?= the_field('auteur'); ?></a></h3>
    </article>
<?php endif; ?>