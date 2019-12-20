<script type="text/javascript">
	$(document).ready(function() {
		$('.navbar .nav li').on('click', function(event) {
			elemId = event.target.id;
			page = elemId+'.php';
//			alert("click "+page);
			location.href = page;
		})
	});
</script>

<header class="navbar navbar-light navbar-fixed-top bs-docs-nav bg-light" role="banner">
	<a class="navbar-brand" href="index.php"><p class="logo"><span class="textDark">Virtual</span><span class=textWhite>Architect</span></p></a>
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation" id="navbarNav">
			<ul class="nav navbar-nav navbar-left">
				<li id="index" class="active transition">Home</li>
				<li id="aboutUs" title="A little bit about us" class="transition">About Us</li>
				<li id="services" title="What we can do for you" class="transition">Services</li>
				<li id="search" title="Design Your Own" class="transition">Design Your Own</li>
				<li id="contact" title="Is this too confusing?" class="transition">Contact us</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li id="login" class="transition"><span class="fa fa-sign-in" style="font-size: large;"></span> Login</li>
			</ul>
		</nav>
	</div>
</header>
