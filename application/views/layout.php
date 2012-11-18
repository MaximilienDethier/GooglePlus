<!DOCTYPE HTML>

<html lang="fr-be">

	<head>
		<meta charset="UTF-8">
		<title><?php echo $titre; ?></title>
		<link id="stylesheet" rel="stylesheet" type="text/css" href="<?php echo base_url().CSS_DIR; ?>style.css" media="all" />
	</head>

	<body>

		<?php echo $vue; ?>

	<script src="<?php echo site_url().JS_DIR; ?>jquery.js"></script>
	<script src="<?php echo site_url().JS_DIR; ?>script.js"></script>

	</body>

</html>