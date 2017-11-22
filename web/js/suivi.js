// Gestion suivi/participation sur pages/sortie.php


$( document ).ready( function() {

	/**
	 * GESTION DES PARTICIPATIONS (boutons, inscription BDD, affichage liste participants )
	 */

	iniParticipe(); //initialise value du bouton "participer" et liste participants
		getboutonparticipation();
		updatelisteparticipants();

	/**
	 * fonction de mise à jour de l'affichage
	 * @return {[type]} [description]
	 */
	function iniParticipe() {
		getboutonparticipation();
		updatelisteparticipants();
	}



	// AJAX valeur bouton "participer"
	//suivi.php?mode=get/suivi&sortie=1&membre=1&format=json
	function getboutonparticipation() {

		$.ajax({
				type: "GET",
	  			url: 'api/suivi.php',
				data: {'mode':'getsuivi', 
					'sortie' : sortie,
					'membre' : membre,
					'format' : 'json'
					},
				success: getresult,
				error : function (res, statut, erreur) { console.log('ajax error : '+erreur); },
				complete : function() { },
				dataType: 'text'
		}); 
		function getresult( res) {
				if ( res.length > 0 ) { 
					var dat = JSON.parse(res);
					//console.log( 'res = '+res );
					//console.log( dat );

					if( dat.mode == 2 ) { // participe 
						$('#boutonparticipe').attr("value", "annuler participation");
					}
					else if ( dat.mode == 0 ) { // pas de participe (annulé précédemment)
						$('#boutonparticipe').attr("value", "participer");
					}


				}
				else { // pas de suivi_sortie 
					$('#boutonparticipe').attr("value", "participer");
				}
		}
	} // end getboutonparticipation()



	// LISTE DES PARTICIPANTS
	function updatelisteparticipants() {

		$.ajax({
				type: "GET",
	  			url: 'api/suivi.php',
				data: {'mode':'getparticipants', 
					'sortie' : sortie
					},
				success: getparticipants,
				error : function (res, statut, erreur) { console.log('ajax error : '+erreur); },
				complete : function() { },
				dataType: 'text'
		}); 
		function getparticipants( res) {

				if ( res.length > 2 ) { // 0 si erreur
					
					var dat = JSON.parse(res);
					var liste = '';

					for(i=0; i<dat.length; i++ ) {
						liste += '<a class="badge" style="background-color:green" href="index.php?p=membre&id='+dat[i].idmembre+'">'
								+dat[i].prenom + '</a> &nbsp;';
					}

					$('#listeparticipants').text('').append(liste);
			
				}
				else { // Aucun participant
					$('#listeparticipants').text("aucun");
				}
				
		} // fin getparticipants
	} // fin updatelisteparticipants

		
	// Modification état
	$('#boutonparticipe').on('click', function() {
		event.preventDefault();

		
		if( $('#boutonparticipe').val() == 'participer' ) {

			$.ajax({
				type: "GET",
	  			url: 'api/suivi.php',
				data: {'mode':'modify', 
					'sortie' : sortie,
					'membre' : membre,
					'newmode': 2,
					'format' : 'text'
					},
				success: modified,
				error : function (res, statut, erreur) { console.log('ajax error : '+erreur); },
				complete : function() { },
				dataType: 'text'
			}); 
			function modified( res) {
				//$('#boutonparticipe').attr("value", "annuler participation");
				//updatelisteparticipants();
				iniParticipe();
			}
		} // end #boutonparticipe ajax get

		else if( $('#boutonparticipe').val() == 'annuler participation' ) {

			$.ajax({
				type: "GET",
	  			url: 'api/suivi.php',
				data: {'mode':'modify', 
					'sortie' : sortie,
					'membre' : membre,
					'newmode': 0,
					'format' : 'text'
					},
				success: modified,
				error : function (res, statut, erreur) { console.log('ajax error : '+erreur); },
				complete : function() { },
				dataType: 'text'
			}); 
			function modified( res) {
				//$('#boutonparticipe').attr("value", "participer");
				//updatelisteparticipants();
				iniParticipe();
			}
		} // end #boutonparticipe ajax get

	}); // end click boutonparticipe
		//*/


}); // fin document ready