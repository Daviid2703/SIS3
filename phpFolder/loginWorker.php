<?php

session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'codeigniter');
define('DB_PASSWORD', 'codeigniter2019');
define('DB_NAME', 'SISIII2020_89191217');

$con = mysqli_connect('localhost', 'codeigniter', 'codeigniter2019', 'SISIII2020_89191217' );

$email = "";
$password = "";


$email_err = "";
$password_err = "";


if(!$con){
	die("Connection error: " . mysqli_connect_error());
}else{
	$sql = "SELECT * FROM Varuh WHERE email = '$_SESSION[username]'";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$email = trim($_POST["txtEmail"]);
		$password = trim($_POST["txtPassword"]);

		$sql = "SELECT email, geslo FROM Varuh WHERE email = '$email' and geslo = '$password'";
		$rs = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
		$count = mysqli_num_rows($rs);

		if($count == 1) {

			$sql2 = "SELECT * FROM Varuh WHERE email = '$email'";
			$rs2 = mysqli_query($con, $sql2);
   			$row2 = mysqli_fetch_array($rs2);
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $email;
			$_SESSION['name'] = $row2['ime']; 
			$_SESSION['surName'] = $row2['priimek'];
			$_SESSION['status'] = "worker";
			header("location: ../index.html", TRUE, 302);
			exit();
		}else{
			echo '<div> Error: wrong username or password.</div>
				<br>
				<button onclick="history.go(-1);">Go Back </button>';
		}

	}
mysqli_close($con);

}
?>