<?php


$con = mysqli_connect('localhost', 'codeigniter', 'codeigniter2019', 'SISIII2020_89191217' );

if(!$con){
	echo 'Connection error: ' . mysqli_connect_error();
}else{

	$txtName = $_POST['txtName'];
	$txtEmail = $_POST['txtEmail'];
	$txtSurname = $_POST['txtSurname'];

	$sql = "INSERT INTO `Stranka` (`email`, `ime`, `priimek`) VALUES ('$txtEmail', '$txtName',  '$txtSurname')";

	$rs = mysqli_query($con, $sql);

	if($rs){
		echo "SUCCESFULL";
	}else{
		echo "Error";
	}
}

?>

