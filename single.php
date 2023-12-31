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

// On démarre la session pour le bouton de retour
session_start();
?>

<!-- /****Affichage dans WordPress****************************************************/ -->
<?php get_header(); ?>

<!-- Aside    ***********************************************************************  -->
<?php //Si c'est un article des catégories projets ou évènements
if (!is_front_page() && (!is_admin()) && (has_term(array('projets', 'evenements'), 'category'))) {
  get_template_part("template-parts/aside");
}
?>
<main class="site_main">
  <article class="section_single">
  <button onclick="goBack()" class="single_retour">Retour</button>
  <input type="hidden" id="referenceUrl" value="<?php echo isset($_SESSION['reference_url']) ? esc_url($_SESSION['reference_url']) : home_url(); ?>">
    <?php
    if (!is_front_page() && (!is_admin()) && (has_term(array('projets', 'evenements'), 'category'))) {
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_title('<h2 class="single-titre">', '</h2>');
          the_content(); ?>

          <?php if ((has_term(array('projets'), 'category'))) { ?>
            <div class="information_single">
              <!-- Afficher les informations des PROJETS et des champs ACF -->
              <div>
                <h3>Auteur : <?php the_field('auteur'); ?></h3>
                <!-- Obtenir les termes (catégories) associés à l'article -->
                <?php
                $categorie = wp_get_post_terms(get_the_ID(), 'category');
                // Parcourez les termes pour trouver la sous-catégorie dont le parent a un slug qui commence par "session" pour lier les cours
                foreach ($categorie as $categories) {
                  if ($categories->parent != 0) {
                    // Il s'agit d'une sous-catégorie
                    $terme_parent = get_term($categories->parent, 'category');
                    // Le slug du parent commence par "session"
                    if (strpos($terme_parent->slug, 'session') === 0) {
                      $categorie_lien = get_term_link($categories);
                      if (!is_wp_error($categorie_lien)) {
                ?>
                        <h4>Réalisé dans :
                          <a href="<?php echo esc_url($categorie_lien); ?>">
                            <?php echo substr($categories->name, 4); ?>
                          </a>
                        </h4>
              </div>
      <?php
                      }
                    }
                    break; // Arrêtez la boucle
                  }
                }

      ?>
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
          <p><?php echo $informations_additonnelles; ?></p>
        <?php
            }
        ?>
      

    <?php
            // Récupérez la valeur du champ AFC 'informations_additonnelles'
            $url_portfolio = get_field('url-html');
            // Vérifiez si le champ n'est pas vide
            if (!empty($url_portfolio)) {
        ?>
          <p><?php echo $url_portfolio; ?></p>
        <?php
            }
        ?>
      
    <?php } ?>

    <?php if (has_term(array('evenements'), 'category')) { ?>
      <!-- /****Modèle si c'est la catégorie evenements *************************************************/ -->
      <!-- Afficher les informations des champs ACF -->
      <br>
      <div class="information_single">
        <h5>Information (et inscription)</h5>
        <p>Qui : <?php the_field('qui'); ?></p>
        <p>Quoi : <?php the_field('quoi'); ?></p>
        <p>Lieu : <?php the_field('lieu'); ?></p>
        <p>Quand : <?php the_field('date_et_heure'); ?></p>

        <br>
        <!-- Afficher les informations quant à l'heure et la date de la publication-->
        <div class="info_heure_date">
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
          <!-- Afficher date et heure de la publication'-->
          <p><b>Heure de publication : <?php the_time('j F Y \à G:i'); ?></b></p>
        </div>

        <!-- Afficher l'icône pour la date de mise à jour -->
        <div class="info_heure_date">
          <svg xmlns="http://www.w3.org/2000/svg" width="23.919" height="22.637" viewBox="0 0 23.919 22.637">
            <g transform="translate(-1178.542 -2146.541)">
              <path id="TracÃ__169" data-name="TracÃ©_169" d="M9.674,2.082h0a5.151,5.151,0,0,0-.716.179c-.157.056-.313.1-.481.157a10,10,0,0,0,6.139,19.02v.212A10.843,10.843,0,0,1,3.021,4.318l.268-.3c.045-.045.078-.089.123-.134s.089-.1.134-.145c.067-.078.145-.145.212-.212s.145-.134.224-.212a1.766,1.766,0,0,1,.179-.157A2.239,2.239,0,0,0,4.341,3c.056-.056.145-.123.212-.179L4.71,2.7l.19-.145.19-.134A10.873,10.873,0,0,1,9.931.539c.123-.011.235-.034.358-.045a1.812,1.812,0,0,0,.246-.011c.078-.011.168-.011.246-.022a1.972,1.972,0,0,1,.257,0h.827a1.9,1.9,0,0,1,.257.011l.257.022A1.376,1.376,0,0,1,12.6.516h.067a10.92,10.92,0,0,1,8.744,6.631l1.454-.4a.465.465,0,0,1,.57.324.511.511,0,0,1-.011.291L22.22,10.569l-.078.212-.4,1.073-.067.179a.461.461,0,0,1-.481.3.4.4,0,0,1-.246-.1l-.514-.4L17.043,9.148a.476.476,0,0,1-.078-.66.447.447,0,0,1,.246-.157l1.912-.526c-1.834-3.231-4.1-5.658-8.039-5.781h-.85l-.581.045h0Z" transform="translate(1178.547 2146.545)" fill="#575756" />
              <path id="TracÃ__169_-_Contour" data-name="TracÃ©_169 - Contour" d="M10.863,0l.1,0,.071,0h.827a2.372,2.372,0,0,1,.308.014l.228.02a1.768,1.768,0,0,1,.238.022H12.7l.028,0A11.4,11.4,0,0,1,21.676,6.6l1.069-.3a.925.925,0,0,1,1.137.647l.005.021a.971.971,0,0,1-.03.552L22.1,12.2a.922.922,0,0,1-.86.6c-.025,0-.05,0-.075,0a.858.858,0,0,1-.508-.2l-.51-.4-3.39-2.685a.93.93,0,0,1-.156-1.3l.014-.017a.9.9,0,0,1,.482-.3l1.326-.364C16.361,4.1,14.138,2.584,11.076,2.486h-.825l-.395.03-.1.018a4.666,4.666,0,0,0-.648.161c-.1.035-.2.066-.293.1l-.189.061A9.536,9.536,0,0,0,14.487,21l.59-.173v1.162l-.319.1A11.306,11.306,0,0,1,2.67,4.021l.008-.009.287-.321c.015-.015.028-.03.041-.045s.049-.056.082-.089c.016-.016.032-.035.049-.053s.046-.052.073-.079c.057-.065.114-.119.165-.168l.06-.058c.036-.036.075-.073.116-.11s.071-.066.108-.1a2.084,2.084,0,0,1,.2-.177L3.874,2.8a1.763,1.763,0,0,0,.141-.123A2.3,2.3,0,0,1,4.2,2.514l.059-.048.007-.006L4.349,2.4l.073-.058.008-.006.2-.156.19-.134A11.4,11.4,0,0,1,9.873.083l.017,0c.05,0,.1-.012.155-.02s.129-.018.2-.025l.042,0A1.515,1.515,0,0,0,10.47.028c.056-.008.11-.012.157-.015s.067,0,.089-.008A1.031,1.031,0,0,1,10.863,0Zm1.779.981h-.077L12.528.97A.968.968,0,0,0,12.38.954l-.04,0L12.058.927a1.639,1.639,0,0,0-.192-.007h-.827l-.11,0-.069,0h-.014c-.055.008-.109.011-.156.015s-.067,0-.089.008a2.064,2.064,0,0,1-.289.016c-.044,0-.089.011-.136.018S10.052.989,9.982,1a10.469,10.469,0,0,0-4.629,1.8l-.181.128-.179.137-.079.062-.07.055-.068.055c-.04.032-.089.071-.11.093a2.6,2.6,0,0,1-.217.19l-.02.016a1.18,1.18,0,0,0-.121.107c-.047.047-.093.089-.133.127s-.062.057-.091.086l-.077.075c-.042.04-.081.077-.111.112l-.024.026c-.016.016-.032.035-.049.053s-.054.06-.086.092c-.015.015-.028.03-.041.045s-.043.05-.072.079l-.257.289a10.393,10.393,0,0,0,.008,13.433A10.456,10.456,0,0,1,8.325,1.983l.007,0L8.4,1.959,7.96,1.739l2.273-.174H11.1a8.283,8.283,0,0,1,5.08,1.825A13.981,13.981,0,0,1,19.523,7.58l.292.514-2.488.684a.023.023,0,0,0,0,.011l3.388,2.683.521.406a.044.044,0,0,0,.005-.01l.546-1.458,1.206-3.2a.111.111,0,0,0,0-.016h0L21.146,7.7l-.156-.375A10.479,10.479,0,0,0,12.642.976Z" transform="translate(1178.547 2146.545)" fill="#575756" />
            </g>
          </svg>
          <!-- Afficher la date et heure de la mise-à-jour'-->
          <p><b>Heure de mise à jour : <?php the_modified_time('j F Y \à G:i'); ?></b></p>
        </div>
      </div>
    <?php } ?>
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