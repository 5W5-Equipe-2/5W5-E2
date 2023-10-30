/**---------------------------------------------------------------------------- function pour le bouton pour l'affichage des articles dans la liste des cours */
jQuery(document).ready(function($) {
    // Fonction pour effectuer la requête AJAX et obtenir les boutons
    function filterPosts(session) {
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'filter_posts',
                session: session
            },
            success: function(response) {
                $('#content').html(response);

                // Gérez les clics sur les boutons pour afficher ou masquer les articles complets
                $('.article-button').on('click', function() {
                    var articleId = $(this).data('article-id');
                    var articleContentContainer = $('#article-content-' + articleId);

                    if (articleContentContainer.is(':visible')) {
                        articleContentContainer.hide();
                    } else {
                        articleContentContainer.show();
                        // Effectuez une nouvelle requête AJAX pour récupérer le contenu de l'article si nécessaire
                    }
                });
            }
        });
    }
      // Gérez les clics sur les boutons de filtre
      $('.filter-button').on('click', function() {
        var session = $(this).data('session');
        filterPosts(session);
    });

    // Au chargement de la page, déclenchez la requête AJAX pour la "session1"
    filterPosts('1');
});


