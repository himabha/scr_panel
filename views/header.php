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
<div class="navbar">
	<div class="container">
		<div class="logo">
			<a href="/">SCR Panel</a>
		</div>
		<div class="nav-links">
			<ul>
				<li><a href="/students">Students</a></li>
				<li><a href="/courses">Courses</a></li>
				<li><a href="/subscriptions">Subscriptions</a></li>
				<li><a href="/login">Login</a></li>
			</ul>
		</div>

	</div>
</div>
<div class="container">
<div class="row">
	<div class="page-title"><?= $this->data['title'] ?></div>
</div>


