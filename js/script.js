/**---------------------------------------------------------------------------- function pour le bouton pour l'affichage des articles dans la liste des cours */
jQuery(document).ready(function ($) {
  // Fonction pour effectuer la requête AJAX et obtenir les boutons
  function filterPosts(session) {
    $.ajax({
      type: "POST",
      url: ajaxurl,
      data: {
        action: "filter_posts",
        session: session,
      },
      success: function (response) {
        $("#content").html(response);

        // Gérez les clics sur les boutons pour afficher ou masquer les articles complets
        $(".article-button").on("click", function () {
          var articleId = $(this).data("article-id");
          var articleContentContainer = $("#article-content-" + articleId);

          if (articleContentContainer.is(":visible")) {
            articleContentContainer.hide();
          } else {
            articleContentContainer.show();
            // Effectuez une nouvelle requête AJAX pour récupérer le contenu de l'article si nécessaire
          }
        });
      },
    });
  }
  // Gérez les clics sur les boutons de filtre
  $(".filter-button").on("click", function () {
    var session = $(this).data("session");
    filterPosts(session);
  });

  // Au chargement de la page, déclenchez la requête AJAX pour la "session1"
  filterPosts("1");
});
document.addEventListener("DOMContentLoaded", function () {
  let menuItems = document.querySelectorAll(".sub-menu li");
  let subMenu = document.querySelector(".sub-menu");
  let storedSubMenuLink = sessionStorage.getItem("subMenuLink");
  let storedLinkColor = sessionStorage.getItem("linkId");
  let lienActif = document.getElementById(storedLinkColor);
  //si le lien l'adresse de la page actuelle concorde avec un lien enregistré du sub-menu
  let isSubMenuOpen = storedSubMenuLink === window.location.href;

  // condition si isSubMenuOpen est vrai ou pas
  if (isSubMenuOpen) {
    //ajoute la classe open a sub-menu pour garder le menu ouvert
    subMenu.classList.add("open");
    //ajout de la classe lienActif pour changer l'aspect du lien selectionné
    lienActif.classList.add("lienActif");
  } else {
    subMenu.classList.remove("open");
    lienActif.classList.remove("lienActif");
  }

  menuItems.forEach(function (menuItem) {
    menuItem.addEventListener("click", function (event) {
      // Get the href attribute of the clicked link
      let linkHref = event.currentTarget
        .querySelector("a")
        .getAttribute("href");
      let linkId = event.currentTarget.id;

      // Store the link's href in sessionStorage
      sessionStorage.setItem("subMenuLink", linkHref);

      // Store the clicked element in sessionStorage
      sessionStorage.setItem("linkId", linkId);
    });
  });
});

/* ---------------boutton retour pour la liste de cours-----------*/

function hide_decription_cours() {
  let hide_decription_cours = document.querySelectorAll(".article-content");

  for (let description_cours of hide_decription_cours) {
    description_cours.style.display = "none";
  }
}

/**
 * Rediriger l'utilisateur vers l'URL prédédent.
 *
 * @param {string} referenceUrl - L'URL de référence vers laquelle l'utilisateur sera redirigé.
 */
function goBack() {
  let referenceUrl = document.getElementById("referenceUrl").value;

  if (referenceUrl) {
    window.location.href = referenceUrl;
  } else {
    window.location.href = "<?php echo esc_url(home_url(" / ")); ?>";
  }
}
/**
 * Initialise le bouton de retour en haut de page avec des fonctionnalités tactiles.
 * @param {HTMLElement} retourHautBouton - L'élément HTML du bouton de retour en haut de page.
 */

document.addEventListener("DOMContentLoaded", function () {
  let retourHautBouton = document.getElementById("retour_haut");

  // Gestion des clics tactiles et non tactiles
  retourHautBouton.addEventListener("touchstart", function () {
    retourHautBouton.classList.add("touche");
    setTimeout(function () {
      retourHautBouton.classList.remove("touche");
    }, 200);
  });

  // Afficher ou masquer le bouton en fonction du défilement
  window.addEventListener("scroll", function () {
    if (
      document.body.scrollTop > 100 ||
      document.documentElement.scrollTop > 100
    ) {
      retourHautBouton.style.display = "block";
    } else {
      retourHautBouton.style.display = "none";
    }
  });
});
