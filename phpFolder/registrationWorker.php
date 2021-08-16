<?php


$con = mysqli_connect('localhost', 'codeigniter', 'codeigniter2019', 'SISIII2020_89191217' );

if(!$con){
	die("Connection error: " . mysqli_connect_error());
}else{

	if ($_POST["txtPassword"] === $_POST["txtPasswordCheck"]) {

	/*$file = $_FILES['fileToUpload'];
	//print_r($file);
	$fileName = $_FILES['fileToUpload']['name'];
	$fileTmpName = $_FILES['fileToUpload']['tmp_name'];
	$fileError = $_FILES['fileToUpload']['error'];
	$fileType = $_FILES['fileToUpload']['type'];

	$fileExt = explode('.', $fileName);
	$fileActExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if(in_array($fileActExt, $allowed)){
		if($fileError === 0){
			$fileNameNew = uniqid('',true) . "." . $fileActExt;
			$fileDestination = '../upload/' . $fileNameNew;
			move_uploaded_file($fileTmpName, $fileDestination);
			echo "Succ";
		}else{
			echo "Error uploading file";
		}

	}else{
		echo "Picture file type must be: jpg, jpeg, png";
	}
*/

	$txtName = $_POST['txtName'];
	$txtSurname = $_POST['txtSurname'];
	$txtEmail = $_POST['txtEmail'];
	$txtDesc = $_POST['txtDesc'];
	$txtPass = $_POST['txtPassword'];

	$sql = "INSERT INTO Varuh (id, ime, priimek, email, geslo, opis, slika) VALUES (NULL, '$txtName',  '$txtSurname','$txtEmail','$txtPass','$txtDesc', '$targetDir$txtEmail')" ;
	$rs = mysqli_query($con, $sql);

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

