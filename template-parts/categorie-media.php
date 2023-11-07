<?php

/**
 * Template part pour afficher la catégorie Accueil
 */
?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
        if (in_category('media')) {
            $photo = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'larger');
            if ($photo) :
            ?>
            <img src="<?= $photo[0]; ?>" >
    <?php 
            endif;
        }
    endwhile;
endif;

// Si aucun article n'a été trouvé, affichez l'image de remplacement
if ($photo == 0) {
    $imagePath = get_template_directory_uri() . '/images/media_vedette_test.jpg';
    ?>
    <img src="<?php echo $imagePath; ?>" alt="Image vedette">
<?php
}

?>