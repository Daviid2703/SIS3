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


	$name = $_POST['txtName'];
	$surname = $_POST['txtSurname'];
	$email = $_POST['txtEmail'];
	$newEmail = $_POST['txtNewEmail'];
	$newPassword = $_POST['txtPassword'];

	$update = "UPDATE Stranka Set email='$newEmail',ime='$name',priimek='$surname',geslo='$newPassword' WHERE email='$email'";


	$sql2=mysqli_query($con,$update);

	echo $sql2;

	if($sql2){
		$_SESSION['username'] = $newEmail;
		$_SESSION["name"] = $name;
		$_SESSION['surName'] = $surname;
		header('location: ../index.html');
	}else{
		echo "Error";
	}

}
mysqli_close($con);

?>
