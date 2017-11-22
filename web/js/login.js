// login.js

$( document ).ready( function() {

	$('#login_button').click( function(){
		$.post(
			'api/index.php',
			{ 	'mode':'login', 
				'email' : $("#login_email").val(), 
				'password' : $("#login_password").val(),
				'tokken' : $("#login_tokken").val() 
			},
			veriflogin,
			'text'
		);
		function veriflogin( res ) {
			
			if ( res ) {
				$('#login_div').html( "--" );
			}
			else {
				//console.log('erreur SQL');
			}
		}
	})


});