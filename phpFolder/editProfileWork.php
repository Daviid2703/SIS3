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
	if($_SERVER["REQUEST_METHOD"] == "POST"){


	$name = $_POST['txtName'];
	$surname = $_POST['txtSurname'];
	$email = $_POST['txtEmail'];
	$newEmail = $_POST['txtNewEmail'];
	$newPassword = $_POST['txtPassword'];
	$desc = $_POST['txtDesc'];


		$update = "UPDATE Varuh SET ime='$name', priimek='$surname', email='$newEmail', geslo='$newPassword', opis='$desc' WHERE email='$email'";

		$sql2=mysqli_query($con,$update);

		if($sql2){
			$_SESSION['username'] = $newEmail;
			$_SESSION["name"] = $name;
			$_SESSION['surName'] = $surname;
			$_SESSION['desc'] = $desc;
			echo "Update succesful";
		}else{
			echo "Error";
		}

	}
}

?>
