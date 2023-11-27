<?php

/**
 * Template part pour afficher la catégorie Accueil
 */
?>

<?php
// Initialiser le nombre d'images par article
$nombreImagesParArticle = 0;

$photo = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'larger');
if ($photo) {
    // Incrémenter le nombre d'images pour cet article
    $nombreImagesParArticle++;

    // Obtenez l'ID de l'image en vedette
    $image_id = get_post_thumbnail_id(get_the_ID());

    // Afficher l'image avec l'attribut data-image-id
    ?>
    <img src="<?= $photo[0]; ?>" data-image-id="<?= $image_id; ?>">
<?php
}
?>