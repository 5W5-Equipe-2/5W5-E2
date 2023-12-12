/**
 *navigation.js.
 *
 *navigation header et projet
 */
 ( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );
	const NavigationProjet = document.getElementById( 'navigation-projet' );
	const nav_header_scroll = document.getElementsByClassName('main-navigation');
	const nav_projet_scroll = document.getElementsByClassName('site__aside');
	//const mediaQueryCondition = window.matchMedia( '( min-width: $largeur__bureau )' );

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];
	//const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];


	// Toggle .toggled quand boutton est appuyé
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );
		//nav_header.style.position = "fixed";

		if(siteNavigation.classList.contains('toggled')){
			for (let nav_header of nav_header_scroll){
				nav_header.style.position = "fixed";
			}  
		} else{
			for (let nav_header of nav_header_scroll){
				nav_header.style.position = "static";
				NavigationProjet.classList.remove( 'toggled' );
				//nav_projet.style.position = "static";
				for (let nav_projet of nav_projet_scroll){
					nav_projet.style.position = "static";
				}
			}
		}

		/* if(siteNavigation.classList.contains('toggled') && mediaQueryCondition.matches){
			siteNavigation.classList.remove( 'toggled' );
			alert("Hello! I am an alert box!!");
		} */

		//document.getElementsByClassName('site_entete').style.position="fixed";

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );

	
}() );


/* --------------------page projet---------------------------- */

( function (){
		const NavigationProjet = document.getElementById( 'navigation-projet' );
		//let nav_projet_scroll = document.querySelectorAll('.site__aside');
		const nav_projet_scroll = document.getElementsByClassName('site__aside');
		const nav_header_scroll = document.getElementsByClassName('main-navigation');
		const mediaQueryCondition = window.matchMedia( '( min-width: $largeur__bureau )' );

		if ( ! NavigationProjet ) {
			return;
		}

		const button_projet = NavigationProjet.getElementsByTagName( 'button' )[ 0 ];

		button_projet.addEventListener( 'click', function() {
			NavigationProjet.classList.toggle( 'toggled' );
			//nav_projet_scroll.style.position = "fixed";

			if(NavigationProjet.classList.contains('toggled')){
				for (let nav_projet of nav_projet_scroll){
					nav_projet.style.position = "fixed";
					nav_projet.style.top = "var(--hauteurHeader)";  // !!!----hauteur du header----!!!
				}
				for (let nav_header of nav_header_scroll){
					nav_header.style.position = "fixed";
				}
			} else{
				for (let nav_projet of nav_projet_scroll){
					nav_projet.style.position = "static";
				}
				for (let nav_header of nav_header_scroll){
					nav_header.style.position = "static";
				}
			}
	
			if ( button_projet.getAttribute( 'aria-expanded' ) === 'true' ) {
				button_projet.setAttribute( 'aria-expanded', 'false' );
			} else {
				button_projet.setAttribute( 'aria-expanded', 'true' );
			}
		} );
}() );

/*---------------fermer les menu burger quand on est en version bureau-----------------*/
( function (){
	/* let largeur = screen.width;
	const NavigationProjet = document.getElementById( 'navigation-projet' );
	const siteNavigation = document.getElementById( 'site-navigation' );
	
	if(siteNavigation.classList.contains('toggled') && largeur >= 992){
		NavigationProjet.classList.remove( 'toggled' );
	} */

	/* const mediaQueryCondition = window.matchMedia( '( min-width: $largeur__bureau )' );
	const NavigationProjet = document.getElementById( 'navigation-projet' );
	const siteNavigation = document.getElementById( 'site-navigation' );

	if ( NavigationProjet.classList.contains('toggled') && mediaQueryCondition.matches ) {
		NavigationProjet.classList.remove( 'toggled' );
	}

	if(siteNavigation.classList.contains('toggled') && mediaQueryCondition.matches){
		siteNavigation.classList.remove( 'toggled' );
	} */
	
}() );