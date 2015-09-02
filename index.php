<?php
require_once("config.php");
if(@$_GET["contact"] == "OK") {
	foreach($_POST as $key => $value) {
		$$key = $value;
	}
		$cms_contact = new _cms;
		$cms_contact -> cms_contact($name,$email,$message);
}
?>
<!DOCTYPE HTML>
<!--
	Big Picture by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Big Picture by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header">

				<!-- Logo -->
					<h1 id="logo">Big Picture</h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
<?php
	$cms_pages_i = mysql_query("SELECT * FROM paginas");
		while($cms_pages_l = mysql_fetch_array($cms_pages_i)) {	
?>                                    
							<li><a href="#<?php echo $cms_pages_l["link"] ?>"><?php echo $cms_pages_l["titulo"] ?></a></li>
<?php
		}
?>
							<li><a href="#contact">Contact</a></li>
						</ul>
					</nav>

			</header>
<?php
	$cms_pages_j = mysql_query("SELECT * FROM paginas");
		while($cms_pages_k = mysql_fetch_array($cms_pages_j)) {	
?>                                    
			<section id="<?php echo $cms_pages_k["link"] ?>" class="main style2 left fullscreen">
				<div class="content box style2">
					<?php echo $cms_pages_k["conteudo"] ?>
				</div>
			</section>
<?php
	}
?>
		<!-- Contact -->
			<section id="contact" class="main style3 secondary">
				<div class="content container">
					<header>
						<h2>Say Hello.</h2>
						<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.</p>
					</header>
					<div class="box container 75%">

					<!-- Contact Form -->
							<form method="post" action="?contact=OK">
								<div class="row 50%">
									<div class="6u 12u(mobile)"><input type="text" name="name" placeholder="Name" /></div>
									<div class="6u 12u(mobile)"><input type="email" name="email" placeholder="Email" /></div>
								</div>
								<div class="row 50%">
									<div class="12u"><textarea name="message" placeholder="Message" rows="6"></textarea></div>
								</div>
								<div class="row">
									<div class="12u">
										<ul class="actions">
											<li><input type="submit" value="Send Message" /></li>
										</ul>
									</div>
								</div>
							</form>

					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">

				<!-- Icons -->
					<ul class="actions">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>

				<!-- Menu -->
					<ul class="menu">
						<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>