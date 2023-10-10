<?php
/**
 * Template part pour afficher les évènements
 */
    $titre = get_the_title();
  ?>

<!-- Affichage dans WordPress ----------------------------------------------------->

<article class="">
   <!--  Afficher l'image -->
  <?php  if(has_post_thumbnail()) {
    the_post_thumbnail('thumbnail');
   //echo get_the_ID();
  } 
/* else {
   //Afficher une image par défaut
    echo get_the_post_thumbnail(27,'thumbnail' );
  } */
?>
<!--  Afficher les infos de l'article -->
  <h3><a href="<?php the_permalink(); ?>"> <?= $titre ?></a></h3>
    <?php $lien = get_permalink(); ?>
    <?php $lire = "<span><a href='" . $lien . "'>... &#187;</a></span>" ?>
   <p> <?= wp_trim_words(get_the_excerpt(), 10, $lire) ?> </p>
  

<!-- Afficher que les sous-catégories associées à l'article --->
<?php
//Si ce n'est pas la page d'accueil....
if (!is_front_page()) {
    $parent_categorie_slug = 'evenements'; 

    // Récupérer l'ID de la catégorie parent en fonction du slug
    $parent_categorie = get_term_by('slug', $parent_categorie_slug, 'category');

    if ($parent_categorie) {
        $args = array(
            'child_of' => $parent_categorie->term_id,
            'hide_empty' => 0, // Inclure les catégories vides
        );

        // Récupérer le ID de la catégorie
        $categorie_ID = wp_get_post_categories(get_the_ID());
        if (!empty($categorie_ID)) {
            $categorie_tableau = array();
            // Récupérer les sous-catégories de la catégorie parent
            $sous_categorie_rq = get_categories($args);
            
            // Vérifier si chaque sous-catégorie fait partie des catégories de l'article.
            foreach ($sous_categorie_rq as $sous_categorie) {
                if (in_array($sous_categorie->term_id, $categorie_ID)) {
                    $categorie_tableau[] = $sous_categorie;
                }
            }
           //Afficher le nom de la sous-catégorie
            if (!empty($categorie_tableau)) {
                ?>
                <ul>
                    <?php foreach ($categorie_tableau as $sous_categorie) : ?>
                        <li>
                            <a href="<?php echo get_category_link($sous_categorie->term_id); ?>">
                                <?php echo $sous_categorie->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php
            }
        }
    }
}
?>

</article>