<?php

/**
 * Template part pour afficher la catégorie évènements
 */
$titre = get_the_title();
?>

<!-- Affichage dans WordPress ----------------------------------------------------->

<article class="">
    <!-------------------------------------------------------------------------------- 
   Page d'accueil et Page de catégorie et sous-catégories
----------------------------------------------------------------------------------->
    <!--  Afficher l'image et en faire un lien clicable -->
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
        </a>
    <?php endif; ?>
    <!--  Afficher le titre l'article (clicable) -->
    <h3><a href="<?php the_permalink(); ?>"> <?= $titre ?></a></h3>

    <!-------------------------------------------------------------------------------- 
    Si c'est la page d'accueil seulement, afficher les infos de l'article 
----------------------------------------------------------------------------------->
    <?php if (is_front_page()) {
        $lien = get_permalink();
        $lire = "<span><a href='" . $lien . "'>... &#187;</a></span>" ?>
        <p> <?= wp_trim_words(get_the_excerpt(), 20, $lire) ?> </p>

        <!-- Afficher les informations des champs AFC -->
        /* À FAIRE AFC PAGE ACCUEIL */

        <!-- Afficher l'icône pour la date-->
        <span><svg xmlns="http://www.w3.org/2000/svg" width="21.289" height="21.289" viewBox="0 0 21.289 21.289">
                <g transform="translate(9.644 3.37)" fill="#fffcf9">
                    <path d="M 1 8.774174690246582 C 0.7243000268936157 8.774174690246582 0.5 8.58243465423584 0.5 8.346755027770996 L 0.5 0.9274149537086487 C 0.5 0.6917449831962585 0.7243000268936157 0.5000049471855164 1 0.5000049471855164 C 1.275699973106384 0.5000049471855164 1.5 0.6917449831962585 1.5 0.9274149537086487 L 1.5 2.12646484375 L 1.5 8.346755027770996 C 1.5 8.58243465423584 1.275699973106384 8.774174690246582 1 8.774174690246582 Z" stroke="none" />
                    <path d="M 1 0.999995231628418 L 1 8.274165153503418 L 1 0.999995231628418 M 1 -4.76837158203125e-06 C 1.552279949188232 -4.76837158203125e-06 2 0.4152145385742188 2 0.9274148941040039 L 2 8.346755027770996 C 2 8.858955383300781 1.552279949188232 9.274165153503418 1 9.274165153503418 C 0.4477200508117676 9.274165153503418 0 8.858955383300781 0 8.346755027770996 L 0 0.9274148941040039 C 0 0.4152145385742188 0.4477200508117676 -4.76837158203125e-06 1 -4.76837158203125e-06 Z" stroke="none" fill="#272838" />
                </g>
                <g transform="translate(9.644 12.059) rotate(-45)" fill="#fffcf9" stroke="#272838" stroke-width="1">
                    <rect width="2" height="7.256" rx="1" stroke="none" />
                    <rect x="0.5" y="0.5" width="1" height="6.256" rx="0.5" fill="none" />
                </g>
                <g fill="none">
                    <path d="M10.645,0A10.645,10.645,0,1,1,0,10.645,10.645,10.645,0,0,1,10.645,0Z" stroke="none" />
                    <path d="M 10.64455032348633 2 C 5.877930641174316 2 2 5.877930641174316 2 10.64455032348633 C 2 15.41117095947266 5.877930641174316 19.28910064697266 10.64455032348633 19.28910064697266 C 15.41117095947266 19.28910064697266 19.28910064697266 15.41117095947266 19.28910064697266 10.64455032348633 C 19.28910064697266 5.877930641174316 15.41117095947266 2 10.64455032348633 2 M 10.64455032348633 0 C 16.52337074279785 0 21.28910064697266 4.765729904174805 21.28910064697266 10.64455032348633 C 21.28910064697266 16.52337074279785 16.52337074279785 21.28910064697266 10.64455032348633 21.28910064697266 C 4.765729904174805 21.28910064697266 0 16.52337074279785 0 10.64455032348633 C 0 4.765729904174805 4.765729904174805 0 10.64455032348633 0 Z" stroke="none" fill="#272838" />
                </g>
            </svg> </span>
    <?php } ?>

    <!--------------------------------------------------------------------------------- 
    Si ce n'est pas la page d'accueil 
    ------------------------------------------------------------------------------>
    <!-- Récupérer les sous-catégories associées à l'article --->
    <?php
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

                //Aller chercher le lien de la sous-catégorie
                if (!empty($categorie_tableau)) { ?>
                    <ul>
                        <?php foreach ($categorie_tableau as $sous_categorie) : ?>
                            <li>
                                <a href="<?php echo get_category_link($sous_categorie->term_id); ?>">
                                    <!-------   
                          Afficher un "em dash" ------->
                                    <!--      <span>&#8212;</span>    -->

                                    <!-------   
                          Afficher un tiret ("dash") ------->
                                    <span>&#45;</span>
                                    <!-------   
                          Afficher la catégorie enfant ------->
                                    <?php echo $sous_categorie->name; ?>
                                </a>
                                <!-- Afficher l'icône pour la date-->
                                <div> <svg xmlns="http://www.w3.org/2000/svg" width="21.289" height="21.289" viewBox="0 0 21.289 21.289">
                                        <g transform="translate(9.644 3.37)" fill="#fffcf9">
                                            <path d="M 1 8.774174690246582 C 0.7243000268936157 8.774174690246582 0.5 8.58243465423584 0.5 8.346755027770996 L 0.5 0.9274149537086487 C 0.5 0.6917449831962585 0.7243000268936157 0.5000049471855164 1 0.5000049471855164 C 1.275699973106384 0.5000049471855164 1.5 0.6917449831962585 1.5 0.9274149537086487 L 1.5 2.12646484375 L 1.5 8.346755027770996 C 1.5 8.58243465423584 1.275699973106384 8.774174690246582 1 8.774174690246582 Z" stroke="none" />
                                            <path d="M 1 0.999995231628418 L 1 8.274165153503418 L 1 0.999995231628418 M 1 -4.76837158203125e-06 C 1.552279949188232 -4.76837158203125e-06 2 0.4152145385742188 2 0.9274148941040039 L 2 8.346755027770996 C 2 8.858955383300781 1.552279949188232 9.274165153503418 1 9.274165153503418 C 0.4477200508117676 9.274165153503418 0 8.858955383300781 0 8.346755027770996 L 0 0.9274148941040039 C 0 0.4152145385742188 0.4477200508117676 -4.76837158203125e-06 1 -4.76837158203125e-06 Z" stroke="none" fill="#272838" />
                                        </g>
                                        <g transform="translate(9.644 12.059) rotate(-45)" fill="#fffcf9" stroke="#272838" stroke-width="1">
                                            <rect width="2" height="7.256" rx="1" stroke="none" />
                                            <rect x="0.5" y="0.5" width="1" height="6.256" rx="0.5" fill="none" />
                                        </g>
                                        <g fill="none">
                                            <path d="M10.645,0A10.645,10.645,0,1,1,0,10.645,10.645,10.645,0,0,1,10.645,0Z" stroke="none" />
                                            <path d="M 10.64455032348633 2 C 5.877930641174316 2 2 5.877930641174316 2 10.64455032348633 C 2 15.41117095947266 5.877930641174316 19.28910064697266 10.64455032348633 19.28910064697266 C 15.41117095947266 19.28910064697266 19.28910064697266 15.41117095947266 19.28910064697266 10.64455032348633 C 19.28910064697266 5.877930641174316 15.41117095947266 2 10.64455032348633 2 M 10.64455032348633 0 C 16.52337074279785 0 21.28910064697266 4.765729904174805 21.28910064697266 10.64455032348633 C 21.28910064697266 16.52337074279785 16.52337074279785 21.28910064697266 10.64455032348633 21.28910064697266 C 4.765729904174805 21.28910064697266 0 16.52337074279785 0 10.64455032348633 C 0 4.765729904174805 4.765729904174805 0 10.64455032348633 0 Z" stroke="none" fill="#272838" />
                                        </g>
                                    </svg>
                                    <p>
                                        <!-- Afficher les informations des champs AFC -->
                                        <?php the_field('date_et_heure'); ?>
                                    </p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php
                }
            }
        } ?>

    <?php
    }
    ?>

</article>