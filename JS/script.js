jQuery(document).ready(function($) {
    $('.filter-button').on('click', function() {
        var session = $(this).data('session');
        
        $.ajax({
            type: 'POST',
            url: ajaxurl, // Utilisez cette variable globale pour l'URL de l'API WordPress
            data: {
                action: 'filter_posts',
                session: session
            },
            success: function(response) {
                $('#content').html(response);
            }
        });
    });
});

