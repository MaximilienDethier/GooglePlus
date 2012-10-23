<h1>Adopte un prof - <?php echo $prof->prenom.' '. $prof->nom; ?> </h1>

<div>

	<h2><?php echo $prof->prenom.' '. $prof->nom; ?> </h2>

	<img title="Fiche de <?php echo $prof->prenom . ' ' .$prof->nom ?>" src="<?php echo site_url().ORIG_DIR.$prof->photo; ?>" />


	<p class="caractere"> <?php echo $prof->caractere ?> </p>

	<p class="specialite">

		Bosse en :

		<?php echo anchor('prof/lister/spec/'.$prof -> sspec_id,
					$prof->specialite,
					array('title' => 'voir les spécialités de de '.$prof->prenom. ' '.$prof->nom,
					'hreflang' => "fr")
					) ?>


	</p>

	<p> <?php echo $prof->cv ?>
	</p>

	<p class="adopte">

		<?php
				if(!isset($deja_adoptes[$prof->prof_id]))

					{
						echo anchor('prof/adopte/'.$prof -> prof_id,
										"J'adopte ce prof !",
										array('title' => 'Adopter '.$prof->prenom. ' '.$prof->nom,
												'hreflang' => "fr")
										);
					}

					else
					{

						echo anchor('prof/libere/'.$prof -> prof_id,
										"Je libère ce prof !",
										array('title' => 'Libérer '.$prof->prenom. ' '.$prof->nom,
												'hreflang' => "fr")
										);

					}
		?>


	</p>

	<p>
			<?php echo anchor('prof/lister',
							"Retour à la page principale !",
							array('title' => 'Retournez à la liste complète des profs',
								  'hreflang' => "fr")
							) ?>
	</p>

	<?php if($deja_adoptes): ?>

	<div id="panier">

		<?php foreach($deja_adoptes as $prof): ?>

			<li>

				<?php echo anchor('prof/voir/'.$prof -> prof_id,
							$prof->prenom,
							array('title' => 'voir la fiche de '.$prof->prenom. ' '.$prof->nom,
								'hreflang' => "fr")
							) 
				?> -

				<?php 					
					echo anchor('prof/libere/'.$prof -> prof_id,
								"Je libère ce prof !",
								array('title' => 'Libérer '.$prof->prenom. ' '.$prof->nom,
									'hreflang' => "fr")
								);
				?>

			</li>

		<?php endforeach; ?>

	</div>

	<?php endif; ?>

</div>