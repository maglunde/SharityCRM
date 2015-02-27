<?php



/*Starter session*/
session_start();

include 'checkSession.php';
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Sharity</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/scrolling-nav.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/font.css" rel="stylesheet">

	</head>

	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
		<?php
		include 'header_nav.php';
		?>
		
		<div class="col-md-3" id="homebox">

			<?php
			$organizationNr = $_SESSION['organizationNr'];
			$sql = "SELECT * FROM Organization WHERE organizationNr = $organizationNr";
			$result = mysqli_query($connection, $sql);

			if ($result) {
				if (mysqli_num_rows($result) == 1) {
					$row = mysqli_fetch_assoc($result);
					
					echo "<h2>" . $row['name'] . "</h2>";
					echo "<img src='" . $row['logoURL'] . "' id='orgLogo'/>";
					echo "<img src='" . $row['backgroundimgURL'] . " ' id='orgBackground'/>";
					
					echo '
					<br/>
					<p>Organisasjonsnummer: ' . $row["organizationNr"] . '</p>
					<p>Om: ' . $row["about"] . '</p>
					<p>Kategori: ' . $row["category"]. '</p>
					<p>Telefon: ' . $row["phone"]. '</p>
					<p>Adresse: ' . $row["address"] . '</p>
					<p>Postnummer: ' . $row["zipcode"]. '</p>
					<p>Epost: ' . $row["email"]. '</p>
					<p>Nettside: ' . $row["website"]. '</p>
					<p>Kontonummer: ' . $row["accountnumber"] . '</p>



					';



				}
			} ?>
			</div>
			<div class="col-md-6" id="homebox">
			<?php
			$sql = "SELECT Donation.*, Project.name FROM Donation INNER JOIN Project ON Donation.projectID = Project.projectID WHERE Project.organizationNr = $organizationNr";
			$result = mysqli_query($connection, $sql);

			if ($result) {
			
				echo "Antall donasjoner: " . mysqli_num_rows($result) . "</br></br></br></br>";
				
				$sum = 0;
				
				
				while ($row = mysqli_fetch_assoc($result)) {

					echo "Donert til prosjektID: " . $row['projectID'];
					echo "<br/>Sum donert: " . $row['sum'] . " kr";
					echo "<br/>Prosjektnavn: " . $row['name'];
					echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
					
					$sum += $row['sum'];
				}
			echo "<h2>Sum kroner innsammlet: " . $sum;
			} else {
				echo "<h2>Failure</h2>";
			}
			
			
			?>
			</div>
			

			

		</div>
		<div class="col-md-3"></div>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<script src="js/stickyheader.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Scrolling Nav JavaScript -->
		<script src="js/jquery.easing.min.js"></script>
		<script src="js/scrolling-nav.js"></script>

	</body>
</html>

