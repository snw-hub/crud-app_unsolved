<?php 
 include('dbConn.php')
   
	
	 $name = "";
	$surname = "";
	$email = "";
	$id = 0;


	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];

		mysqli_query($db, "INSERT INTO tab (name, surname, email) VALUES ('$name', '$surname', '$email')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}
	
	
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];

	mysqli_query($db, "UPDATE tab SET name='$name', surname='$surname' , email='$email'  WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}



if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM tab WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}

?>