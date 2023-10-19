<?php

/* Formulaire de recherche personnalisée */

?>

 

<form class="recherche" role="search" method="get"  action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <label>

    <input class="recherche__input" type="search" class="search-field" autocomplete="off"

    placeholder="Rechercher..." value="<?php echo get_search_query(); ?>" name="s" />

    <button class="recherche__bouton" type="submit" class="search-submit">

    <span class="recherche__icone"><svg xmlns="http://www.w3.org/2000/svg" width="19.894" height="19.639" viewBox="0 0 19.894 19.639">
  <g id="Groupe_21" data-name="Groupe 21" transform="translate(0 8.417) rotate(-45)">
    <rect id="Rectangle_6" data-name="Rectangle 6" width="2.164" height="10.099" transform="translate(5.05 10.821)"/>
    <path id="Rectangle_6_-_Contour" data-name="Rectangle 6 - Contour" d="M1,1V9.1h.164V1H1M0,0H2.164V10.1H0Z" transform="translate(5.05 10.821)" fill="#707070"/>
    <circle id="Ellipse_1" data-name="Ellipse 1" cx="5.951" cy="5.951" r="5.951" transform="translate(0 0)"/>
    <path id="Ellipse_1_-_Contour" data-name="Ellipse 1 - Contour" d="M5.951,1A4.951,4.951,0,1,0,10.9,5.951,4.957,4.957,0,0,0,5.951,1m0-1A5.951,5.951,0,1,1,0,5.951,5.951,5.951,0,0,1,5.951,0Z" transform="translate(0 0)" fill="#707070"/>
    <circle id="Ellipse_2" data-name="Ellipse 2" cx="4.869" cy="4.869" r="4.869" transform="translate(1.082 1.082)" fill="#fff"/>
    <path id="Ellipse_2_-_Contour" data-name="Ellipse 2 - Contour" d="M4.869,1A3.869,3.869,0,1,0,8.739,4.869,3.874,3.874,0,0,0,4.869,1m0-1A4.869,4.869,0,1,1,0,4.869,4.869,4.869,0,0,1,4.869,0Z" transform="translate(1.082 1.082)" fill="#707070"/>
  </g>
</svg></span>

  </span>

    </button>

  </label>

</form>