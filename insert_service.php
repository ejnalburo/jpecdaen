<?php
include 'config.php';

	$name = $description = $fee =  "";
	$valid = true;

	if(isset($_POST['name']) && !empty($_POST['name'])){
		$name = mysqli_real_escape_string($conn,$_POST['name']);
	}else{
 		$valid = false;
 		$error .= "* Name is required.\n";
 		$name = '';
	}


	if(isset($_POST['description']) && !empty($_POST['description'])){
		$description = mysqli_real_escape_string($conn,$_POST['description']);
	}else{
 		$valid = false;
 		$error .= "* Description is required.\n";
 		$description = '';
	}

	if(isset($_POST['fee']) && !empty($_POST['fee'])){
		$fee = mysqli_real_escape_string($conn,$_POST['fee']);
	}else{
 		$valid = false;
 		$error .= "* Username is required.\n";
 		$fee = '';
	}


	if($valid){

		$sql = "INSERT INTO services(`srvc_id`, `name`, `description`, `fee`) VALUES(NULL, '$name', '$description', '$fee')";
		
		$query = mysqli_query($conn, $sql); 

		$data = array("valid"=>true, "msg"=>"Data dispensed.");
		echo json_encode($data);

	}else{
 		$data = array("valid"=>false, "msg"=>"Data not inserted.");
 	    echo json_encode($data);
	}
?>
