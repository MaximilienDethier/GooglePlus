<div id="listLinks">

	<div id="dashboard">
		<h1>GoogleLinks</h1>

		<h2>Bienvenue, <?php echo $this->session->userdata('name_member');?></h2>

		<?php

		echo form_open('lien/ajouter', array('method' => 'post'));

		echo form_label('Votre Lien :', 'contenu');

		$contenuInput = array('name' => 'contenu', 'id' => 'contenu', 'value' => $contenu);

		echo form_input($contenuInput);

		echo form_label('Titre :', 'titre');

		$formTitre = array('id'=>'titre','name' => 'hiddenTitre', 'value' => $titre);
		echo form_input($formTitre);

		echo form_label('Description :', 'description');

		$formDescription = array('id' => 'description', 'name' => 'hiddenDescription', 'value' => $description);
		echo form_textarea($formDescription);

		//Hidden infos pour envoyer dans la DBB

		$contenuHiddenImages = array('type' => 'hidden', 'id' => 'hiddenImages', 'name' => 'hiddenImages', 'value' => $images[$choix]);
		echo form_input($contenuHiddenImages);

		$base = base_url();
		$hiddenBaseUrl = array('type' => 'hidden', 'id' => 'BaseUrl', 'name' => 'baseUrl', 'value' => $base);
		echo form_input($hiddenBaseUrl);

		if(isset($idNewPost))
		{
		$hiddenNewPost = array('type' => 'hidden', 'id' => 'newPost', 'name' => 'baseUrl', 'value' => $idNewPost);
		echo form_input($hiddenNewPost);
		}

		//Afficher la preview

		?>

	<h3>Image Choisie:</h3>

	<img src="<?php echo $images[$choix]; ?>" id="imageChoisie" /> 

	<h3>Choisissez votre image:</h3>

	<div class="cadre">

		<img src="<?php echo site_url().IMG_DIR; ?>leftArrow.png" id="imagePrev" width="20" height="47"/>
		<div id="innerBox">
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
		<img src="<?php echo site_url().IMG_DIR; ?>rightArrow.png " id="imageNext" width="20" height="47"/>

	</div>

	 <br />

	<?php

	$submit = array('name' => 'check', 'id' => 'submitFinal', 'value' => 'Partager !');

	echo form_submit($submit);

	echo form_close();

	?>

	</div>

	<div id="body">

		<?php if(count($liens)): ?>

		<section>

		<?php $i = 0;
		foreach(array_reverse($liens) as $lien): 

		$classBlock = ($i%2 == 0)?"pair":"impair"; ?>

			<article class="<?php echo $classBlock ?>">
				<h3> <?php echo $lien->title; ?> </h3> <a class="visit" href="<?php echo $lien->url; ?>">Visiter ce site</a>

				<p> <?php echo $lien->meta; ?>  </p>

				<img src="<?php echo $lien->images; ?> "/>

				<div id="modify">
					<?php echo anchor('/lien/supprimer/'.$lien->lien_id,
					'[X]',
					array( 'class' => 'supprimerLien',
					'title' => 'Supprimez ce lien !',
					'hreflang' => "fr")); ?>

					<?php echo anchor('/lien/modifier/'.$lien->lien_id,
					'[Modifier]',
					array( 'class' => 'modifierLien',
					'title' => 'Modifiez ce lien !',
					'hreflang' => "fr")); ?>
				</div>

			</article>

		<?php $i++;	endforeach; ?>

		</section>

		<?php endif; ?>

	</div>

</div>