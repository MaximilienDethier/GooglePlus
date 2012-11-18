<div id="listLinks">
	<div id="dashboard" class="modifier">
		<div id="inputBlock">
			<h1>GoogleLinks</h1>

			<?php

			echo form_open('lien/updateProcess', array('method' => 'post'));

			echo form_label('Titre :', 'titre');

			$Titre = array('name' => 'titre', 'value' => $title);
			echo form_input($Titre);

			echo form_label('Votre Lien :', 'contenu');

			$contenuInput = array('name' => 'contenu', 'id' => 'contenu', 'value' => $url);

			echo form_input($contenuInput);

			echo form_label('Description :', 'description');

			$textarea = Array ("name" => "description", 'value' => $meta);
			echo form_textarea($textarea); 

			$hiddenIdPost = Array ("type"=>"hidden", "name" => "idpost", 'value' =>$idpost);
			echo form_input($hiddenIdPost); ?>
		</div>
	
		<div id="cadre">
			<h3>Vous avez choisi l'image :</h3>

			 <img src="<?php echo $images; ?>" id="imageChoisie" /> 
		</div>

		<div id="buttons">
		<?php

		$submit = array('name' => 'check', 'id' => 'updateButton', 'value' => 'Enregistrer');
		echo form_submit($submit);
		?>

		<a id="cancelButton" href="<?php echo base_url().'lien/lister'; ?>">Annuler</a>

		</div>
 		<?php echo form_close(); ?>
	</div>
</div>