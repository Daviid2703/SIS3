<?php

$con = mysqli_connect('localhost', 'codeigniter', 'codeigniter2019', 'SISIII2020_89191217' );



if(!$con){
	die("Connection error: " . mysqli_connect_error());
}else{
	if ($_POST["txtPassword"] === $_POST["txtPasswordCheck"]) {
   		
   		$txtName = $_POST['txtName'];
		$txtSurname = $_POST['txtSurname'];
		$txtEmail = $_POST['txtEmail'];
		$txtPass = $_POST['txtPassword'];

		$insertSQL = "INSERT INTO Stranka (email, ime, priimek, geslo) VALUES ('$txtEmail', '$txtName',  '$txtSurname', '$txtPass')";
		$rs = mysqli_query($con, $insertSQL);

		if($rs){
			header("location: ../index.html", TRUE, 302);
			exit();
		}else{
			die('<span>Error: Account with the email already exists</span>
					<br>
			  	<button onclick="history.go(-1);">Go Back </button>');
		}
	}else{
		die('<span>Error: Password did not match</span>
					<br>
			  	<button onclick="history.go(-1);">Go Back </button>');
	}
	mysqli_close($con);
}

?>

