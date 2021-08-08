<?php ?>
<html>
<head>
	<title><?php echo $this->data['title']; ?></title>
	<link rel="stylesheet" href="<?= (_is_https() ? "https://" : "http://").SITE_URL ?>/assets/css/styles.css"/>
	<script type="text/javascript" src="<?= (_is_https() ? "https://" : "http://").SITE_URL ?>/assets/js/jquery.min.js"></script>	
	<script type="text/javascript" src="<?= (_is_https() ? "https://" : "http://").SITE_URL ?>/assets/js/pagination.js"></script>
	<script type="text/javascript" src="<?= (_is_https() ? "https://" : "http://").SITE_URL ?>/assets/js/scripts.js"></script>
</head>
<body>
