<?php ?>
<html>
<head>
	<title><?php echo $this->data['title']; ?></title>
	<link rel="stylesheet" href="<?= (_is_https() ? "https://" : "http://").SITE_URL ?>/assets/css/styles.css"/>
	<script type="text/javascript" src="<?= (_is_https() ? "https://" : "http://").SITE_URL ?>/assets/js/jquery.min.js"></script>
</head>
<body>
<div class="navbar">
	<div class="container">
		<div class="logo">
			<a href="/">SCR Panel</a>
		</div>
		<div class="nav-links">
			<ul>
				<li><a href="/login">Login</a></li>
			</ul>
		</div>

	</div>
</div>
<div class="container">
<div class="row" id="login-form">
	<div class="form-group">
		<div class="page-title">Login</div>
			<form action="/login" method="post">
				<div class="field-group">
					<input type="text" name="username" placeholder="User name" required>
				</div>
				<div class="field-group">
					<input type="password" name="password" placeholder="Password" required>
				</div>
				<div class="field-group">
					<input type="submit" name="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>