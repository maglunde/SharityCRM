<?php
session_start();
ob_start();
if (isset($_POST['projectIDtoShow'])) {
	$_SESSION['projectIDtoShow'] = $_POST['projectIDtoShow'];
	echo "ProjectIDtoShow er satt i localStorageJStoPHP";
}
if (isset($_POST['newsIDtoShow'])) {
	$_SESSION['newsIDtoShow'] = $_POST['newsIDtoShow'];
	echo "NewsIDtoShow er satt i localStorageJStoPHP";
}
if(isset($_POST['projectNameToRegister'])){
	$_SESSION['projectNameToRegister'] = $_POST['projectNameToRegister'];
	echo "projectNameToRegister er satt i localStorageJStoPHP";
}
ob_end_flush();
?>