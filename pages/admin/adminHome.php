

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	

	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">
</head>
<body>

	<div class="col-md-12 text-center"><h1>ADMIN</h1></div>
	<?php
	include "adminHeader_nav.php";
	?>

	<div class="container">
		<div class="col-lg-1 col-md-0 col-xs-0"></div>

		<div class="col-lg-10 col-md-12 col-xs-12">

			<div class="col-lg-4 col-md-4 col-xs-12" onclick="location.href='showOrg.php';" id="homebox">
				<h1>Organisasjon</h1>
			</div>

			<div class="col-lg-4 col-md-4 col-xs-12" onclick="location.href='showUser.php';" id="homebox">
				<h1>Bruker</h1>
			</div>

			<div class="col-lg-4 col-md-4 col-xs-12" onclick="location.href='showStats.php';" id="homebox">
				<h1>Statistikk</h1>
			</div>

		</div>

		<div class="col-lg-1 col-md-0 col-xs-0"></div>
	</div>

</body>
</html>