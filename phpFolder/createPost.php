<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'codeigniter');
define('DB_PASSWORD', 'codeigniter2019');
define('DB_NAME', 'SISIII2020_89191217');

$con = mysqli_connect('localhost', 'codeigniter', 'codeigniter2019', 'SISIII2020_89191217' );


	if(!$con){
		die("Connection error: " . mysqli_connect_error());
	}else{

		$sql = "SELECT * FROM Varuh WHERE email = '$_SESSION[username]'";
		$rs = mysqli_query($con, $sql);
   	 	$row = mysqli_fetch_array($rs);

   	 	$idWorker = $row['id'];
		$txtCity = $_POST['txtCity'];
		$txtCountry = $_POST['txtCountry'];
		$txtDescLoc = $_POST['txtDescLoc'];
		$txtDescExtra = $_POST['txtDescExtra'];
		$price = $_POST['txtPrice'];


	$sql2 = "INSERT INTO Oglas (id, v_id, opis_lokacije, mesto, drzava, cena, dodatne_info) VALUES (NULL, '$idWorker',  '$txtDescLoc','$txtCity','$txtCountry','$price','$txtDescExtra')" ;
	$rs2 = mysqli_query($con, $sql2);

	if($rs2){
		header("location: ../index.html", TRUE, 302);
		exit();
		}
	}
	mysqli_close($con);
?>