// AJAX vers api/index.php 
// plutot recherche sorties... 


$( document ).ready( function() {


	$('#searchbutton').click( function(){

		event.preventDefault();

		$("#searchresult").html('Recherche en cours...');
		
		outputerror = '<div class="alert alert-info">Aucun résultat.</div>';

		$.ajax({
			type: "POST",
  			url: 'api/index.php',
			data: {'mode':'sortie', 
				'search' : $("#inputsearch").val(),
				'date' : $("#datesearch").val()
				},
			success: getresult,
			error : $("#searchresult").html( outputerror ),
			dataType: 'json'
		}); // .error() and .complete()

		function getresult( sortie ) {

			if ( sortie.length > 0 ) {

				var output = '<ul class="list-group">';

				for( i=0; i<sortie.length; i++ ) {
					
					dat = sortie[i].date.substr(0,10); // 2017-11-02

					output += '<li class="list-group-item">' + sortie[i].ville +' : <a href="index.php?p=sortie&id='
						+ sortie[i].idsortie +'">Sortie à ';
					output += sortie[i].sitenom + '</a> ('+ dat +') avec <a href="index.php?membre='
						+sortie[i].organisateur +'">'+sortie[i].prenom+'</a></li>';
				}
				output += '</ul>'; 

				$("#searchresult").html(output);
			}
			else{ // ?? 
				$("#searchresult").html('Aucun résultat');
			}
		}
	});



});
