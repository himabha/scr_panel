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
				<li class="<?= (strpos($this->data['activeRoute'], "students") !== false || strpos($this->data['activeRoute'], "index") !== false) ? 'active' : '' ?>"><a href="/students">Students</a></li>
				<li class="<?= (strpos($this->data['activeRoute'], "courses") !== false) ? 'active' : '' ?>"><a href="/courses">Courses</a></li>
				<li class="<?= (strpos($this->data['activeRoute'], "subscriptions") !== false) ? 'active' : '' ?>"><a href="/subscriptions">Subscriptions</a></li>
				<?php if($_SESSION['user']):?>
				<li><a href="/logout">Logout</a></li>
					<?php else:?>
				<li><a href="/login">Login</a></li>
				<?php endif; ?>
			</ul>
		</div>

	</div>
</div>
<div class="container">
	<div class="row">
		<div class="page-title"><?= $this->data['title'] ?></div>
	</div>


