<div id="member">
	<h2>Inscrivez-vous</h2>

	<?php

	echo form_open('member/signUpProcess', array('method' => 'post'));

	echo form_label('Votre Nom :', 'nom');

	$emailInput = array('name' => 'nom', 'id' => 'nom');

	echo form_input($emailInput);

	echo('<br />');

	echo form_label('Adresse mail :', 'email');

	$emailInput = array('name' => 'email', 'id' => 'email');

	echo form_input($emailInput);

	echo('<br />');

	echo form_label('Mot de passe :', 'mdp');

	$mdpInput = array('name' => 'mdp', 'id' => 'mdp');

	echo form_password($mdpInput);

	echo('<br />');

	echo form_submit("check", "S'inscrire");

	echo form_close();

	?>

</div>