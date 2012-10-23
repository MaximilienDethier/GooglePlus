<div id="listLinks">

	<h1>GooglePlus - Mes liens favoris !</h1>

	<h2>Bienvenue, <?php echo $this->session->userdata('name_member');?></h2>

	<?php

	echo form_open('lien/verifier', array('method' => 'post'));

	echo form_label('Votre Lien :', 'contenu');

	$contenuInput = array('name' => 'contenu', 'id' => 'contenu');

	echo form_input($contenuInput);

	echo form_submit('check', 'Prévisualiser');
 
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