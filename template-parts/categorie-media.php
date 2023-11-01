<?php

/**
 * Template part pour afficher la catégorie Accueil
 */
?>

<?php

$idx = 0;
if (have_posts()) : while (have_posts()) : the_post();
    if (in_category('media')) {
        $photo = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'larger');
        $featuredText = get_post_meta($post->ID, '_featuredText', true);
        $featuredTextBold = get_post_meta($post->ID, '_featuredTextBold', true);

        if ($photo):
            ?>
            <article id="post-<?php the_ID(); ?>">
                <div>
                    <img src="<?= $photo[0]; ?>" width="<?= $photo[1]; ?>" height="<?= $photo[2]; ?>" />
                </div>
            </article>
            <?php
            $idx++;
        endif;
    }
endwhile;
endif;

// Si aucun article n'a été trouvé, affichez l'image de remplacement
if ($idx === 0) {
    $imagePath = get_template_directory_uri() . '/images/media_vedette_test.jpg';
    ?>
    <img src="<?php echo $imagePath; ?>" alt="Image vedette">
    <?php
}

?>


