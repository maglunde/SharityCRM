



<?php
session_start();
include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
if(isset($_POST['registerNews'])){
	$organizationNr = $_SESSION['organizationNr'];
}
?>

<html>
<head>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Sharity</title>
	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>


	<link href="../css/vegard_main.css" rel="stylesheet"/>



</head>
<body>

	<?php
	include "../pages/header_nav.php";
	?>

	<?php

	$newsID = $_SESSION['newsIDtoShow'];
	$sql = "SELECT * FROM News WHERE newsID = $newsID";
	$result = mysqli_query($connection, $sql);
	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$projectID = $row['projectID'];

			$sql1 = "SELECT name FROM Project WHERE projectID = '$projectID'";
			$result1 = mysqli_query($connection, $sql1);

			if($result1){
				if(mysqli_num_rows($result1) == 1){
					$row1 = mysqli_fetch_assoc($result1);
					$projectName = $row1['name'];
				}
			}
			$backgroundimgURL = $row['backgroundimgURL'];

			if($backgroundimgURL == ""){
				$backgroundimgURL = "../img/default.png";
			}

			$title = $row['title'];

			$txt = $row['txt'];

		}else{

		}
	}else{

	}


	?>

	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="col-md-12 text-center" id="reg_pt2_head">


		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 text-center">
				<?php echo "<h1 style='color:black'>" . $projectName . "</h1>"?>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">

				<?php
				echo '<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL" />';
				echo '<img src="../phpBackend/'. $backgroundimgURL . '" id="preview" alt="Click to upload img" name="preview" />';
				echo '<input type="text" id="reg_news_input" class="form-control" name="newsHeader" placeholder="Nyhetsoverskrift" value="' . $title . '"readonly/>';
				echo '<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="newsText" placeholder="Nyhetstekst" readonly>'. $txt .'</textarea>'

				?>

			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<div class="col-md-3"></div>
	<div class="col-md-12" id="somespace"></div>
</div>
</body>
</html>

<script type="text/javascript">






</script>	
