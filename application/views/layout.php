<!DOCTYPE HTML>

<html lang="fr-be">

	<head>
		<meta charset="UTF-8">
		<title><?php echo $titre; ?></title>
		<link id="stylesheet" rel="stylesheet" type="text/css" href="<?php echo CSS_DIR; ?>style.css" media="all" />
	</head>

	<body>

		<?php echo $vue; 
		
		if(!$this->session->userdata('logged_in'))
		{
			$boolConnect=false;
		}
		else
		{
			$boolConnect=true;
		}

		if($boolConnect)
		{ 
			echo anchor('/member/unlog',
				"Se déconnecter",
				array( 'id' => 'deco',
				'title' => 'Déconnectez-vous',
				'hreflang' => "fr")
			);

		}

		?>

	<script src="<?php echo JS_DIR; ?>jquery.js"></script>
	<script src="<?php echo JS_DIR; ?>script.js"></script>

	</body>

</html>