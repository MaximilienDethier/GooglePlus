<div id="member">
	<h2>Connectez-vous</h2>

	<?php

	echo form_open('member/login', array('method' => 'post'));

	echo form_label('Adresse mail :', 'email');

	$emailInput = array('name' => 'email', 'id' => 'email');

	echo form_input($emailInput);

	echo('<br />');

	echo form_label('Mot de passe :', 'mdp');

	$mdpInput = array('name' => 'mdp', 'id' => 'mdp');

	echo form_password($mdpInput);

	echo('<br />');

	echo form_submit('check', 'Se Connecter');

	echo form_close();

	if(!$boolConnect){
	echo anchor('/member/signUp',
		"Pas encore Membre ?",
		array( 'id' => 'signUp',
		'title' => 'Déconnectez-vous',
		'hreflang' => "fr")
	);
	}

	?>

</div>