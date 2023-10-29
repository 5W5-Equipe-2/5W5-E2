<?php

/**
 * Modèle pour single.php
 * 
 */

/****Requêtes SQL de WP****************************************************/
    $categorie = get_queried_object();
    $args = array(
        'category_name' => $categorie->slug,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $query = new WP_Query($args);
    ?>

<!-- /****Affichage dans WordPress****************************************************/ -->
<?php get_header(); ?>

<main class="site_main">
  <article class="section_single">
    <?php

    /****Modèle si c'est la catégorie projets *************************************************/
    if (in_category('projets')) {
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_title('<h2 class="single-titre">', '</h2>');
          the_content(); ?>
          <div class="information_single">
          <!-- Afficher les informations des champs AFC -->
          <h3>Auteur : <?php the_field('auteur'); ?></h3>

          <!-- Obtenir les termes (catégories) associés à l'article -->
          <?php
          $categorie = wp_get_post_terms(get_the_ID(), 'category');
          // Parcourez les termes pour trouver la sous-catégorie dont le parent a un slug qui commence par "session"
          foreach ($categorie as $categories) {
            if ($categories->parent != 0) {
              // Il s'agit d'une sous-catégorie
              $terme_parent = get_term($categories->parent, 'category');
              // Le slug du parent commence par "session"
              if (strpos($terme_parent->slug, 'session') === 0) {
                $categorie_lien = get_term_link($categories); // Obtenir l'URL de la catégorie
                if (!is_wp_error($categorie_lien)) {
          ?>
                  <h4>Réalisé dans :
                    <a href="<?php echo esc_url($categorie_lien); ?>">
                      <?php echo substr($categories->name, 4); ?>
                    </a>
                  </h4>
     
          <?php
                }
                break; // Arrêtez la boucle
              }
            }
          }
          ?>
          <div>
            <!-- Afficher l'icône, la saison et l'année-->
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="21.289" height="21.289" viewBox="0 0 21.289 21.289">
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
              <h5> <?php the_field('saison'); ?></h5>
              <h5> <?php the_field('annee'); ?></h5>
            </div>
            <?php
            // Récupérez la valeur du champ AFC 'informations_additonnelles'
            $informations_additonnelles = get_field('informations_additonnelles');
            // Vérifiez si le champ n'est pas vide
            if (!empty($informations_additonnelles)) {
            ?>
              <p>Information additionnelle : <?php echo $informations_additonnelles; ?></p>
            <?php
            }
            ?>
            </div>
      <?php
        endwhile;
      endif;
    }

    /****Modèle par défaut*************************************************************/
    else {
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_title('<h2 class="single_titre">', '</h2>');
          the_content();
        endwhile;
      endif;
    }
      ?>
  </article>

</main>

<?php get_footer(); ?>