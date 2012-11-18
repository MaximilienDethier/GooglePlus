<div id="listLinks">

	<div id="dashboard">
		<h1>GoogleLinks</h1>

		<h2>Bienvenue, <?php echo $this->session->userdata('name_member');
			
			echo anchor('/member/unlog',
				"(Se&nbsp;déconnecter&nbsp;?)",
				array( 'id' => 'decoTitle',
					'title' => 'Déconnectez-vous',
					'hreflang' => "fr"));

			?></h2>

		<?php

		echo form_open('lien/verifier', array('method' => 'post'));

		echo form_label('Insérez un lien :', 'contenu');

		$contenuInput = array('placeholder' => 'Votre lien', 'name' => 'contenu', 'id' => 'contenu');

		echo form_input($contenuInput);

		$submit = array('name' => 'check', 'id' => 'submit', 'value' => 'Partager !');

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
				<h3> <?php echo $lien->title; ?> </h3> <a class="visit" title="Accédez à <?php echo $lien->title; ?>" href="<?php echo $lien->url; ?>">Visiter ce site</a>

				<p> <?php echo $lien->meta; ?>  </p>

				 <a href="<?php echo $lien->url; ?>"  title="Accédez à <?php echo $lien->title; ?>"> <img src="<?php echo $lien->images; ?> "/></a>

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