<?php
/**
 * Template part la catégorie projets
 */
$titre = get_the_title();
?>

<?php if (has_term(array('projets', 'evenements'), 'category')) : ?>
    <article class="categorie__article">
        <?php the_post_thumbnail('thumbnail'); ?>
        <h3><a href="<?php the_permalink(); ?>"> <?= $titre ?></a></h3>
        <?php $lien = get_permalink(); ?>
        <?php $lire = "<span><a href='" . $lien . "'>... &#187;</a></span>" ?>
        <p> <?= wp_trim_words(get_the_excerpt(), 10, $lire) ?> </p>
    </article>
<?php endif; ?>
