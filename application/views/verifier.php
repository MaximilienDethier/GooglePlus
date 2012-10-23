<div id="listLinks">

	<h1>GooglePlus - Vos Activités Récentes !</h1>

	<h2>Bienvenue, <?php echo $this->session->userdata('name_member');?></h2>

	<?php

	echo form_open('lien/ajouter', array('method' => 'post'));

	echo form_label('Votre Lien :', 'contenu');

	$contenuInput = array('name' => 'contenu', 'id' => 'contenu', 'value' => $contenu);

	echo form_input($contenuInput);

	//Hidden infos pour envoyer dans la DBB

	$contenuHiddenTitre = array('type' => 'hidden', 'name' => 'hiddenTitre', 'value' => $titre);
	echo form_input($contenuHiddenTitre);

	$contenuHiddenTitre = array('type' => 'hidden', 'name' => 'hiddenDescription', 'value' => $description);
	echo form_input($contenuHiddenTitre);

	$contenuHiddenImages = array('type' => 'hidden', 'name' => 'hiddenImages', 'value' => $images[$choix]);
	echo form_input($contenuHiddenImages);

	//Afficher la preview

	?>

	<h3><?php echo $titre;?></h3>

	<div class="cadre">

		<?php 
		$i=0;
		foreach ($images as $image): ?>

			<?php echo anchor('/lien/choisir/'.$i,
				'<img src="'.$image.'" />',
				array( 'title' => 'Choisir cette image !',
				'hreflang' => "fr")); ?>

			<?php $i++ ?>

		<?php endforeach; ?>

	</div>

	<h3>Vous avez choisi l'image :</h3>

	 <img src="<?php echo $images[$choix]; ?>" /> 

	<p id="description"> <?php echo $description; ?></p>

	<?php

	echo form_submit('check', 'Partager !');
 
	echo form_close();

	?>

	<div id="body">

		<?php if(count($liens)): ?>

		<ul>

		<?php
		foreach($liens as $lien):
		?>

			<li>
				<a href="<?php echo $lien->url; ?>"> <h3> <?php echo $lien->title; ?> </h3> </a>

				<p> <?php echo $lien->meta; ?>  </p>

				<img src="<?php echo $lien->images; ?> "/>

				<?php echo anchor('/lien/supprimer/'.$lien->lien_id,
				'[X]',
				array( 'class' => 'supprimerLien',
				'title' => 'Supprimez ce lien !',
				'hreflang' => "fr")); ?>
			</li>

		<?php endforeach; ?>

		</ul>

		<?php endif; ?>

	</div>

</div>