/////////////////////Bouton pour le tableau de la page programme/////////////////////////
document.addEventListener("DOMContentLoaded", function() {
    const sessionButtons = document.querySelectorAll(".session-button");
    const tableContainer = document.getElementById("table-container");

    // Écouteurs d'événements pour les boutons de session
    sessionButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const session = button.getAttribute("data-session");

            // Utilisez AJAX ou les fonctions WordPress pour récupérer les articles de la session sélectionnée
            // Remplacez ce code par la récupération réelle des articles de WordPress
            const articlesHTML = `<p>Contenu de la session ${session} ici.</p>`;

            // Affichez les articles dans le tableau
            tableContainer.innerHTML = articlesHTML;
        });
    });
});

