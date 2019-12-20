<!DOCTYPE html>
<html>
    <head>
		<?php
			include 'includes/head.php';
		?>
    </head>
    <body class="pages">
		<script>
			$(document).ready(function() {
//				$(document).ready(doTransition(''));
				setActiveMenu('index');
			})
		</script>
		<?php include 'navBarTop.php'; ?>
		
		<div id="home">
			<div class="container" style="margin-top: 70px;">
				<?php  include 'carouselHome.php'; ?>
				<p class="text-center" style="padding-top: 20px;">It's on its way!</p>
			</div>
		</div>
    </body>
</html>
