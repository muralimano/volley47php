<?php 


if($_SERVER["REQUEST_METHOD"]=="POST"){
	include 'connection.php';


	 showStudent();
}

function showStudent(){

	global $connect;

	$query = "select * from student;";
	$result = mysqli_query($connect, $query);

	$numbers_of_row = mysqli_num_rows($result);
 
	$temp_arry = array();

	if($numbers_of_row > 0){
		while ($row = mysqli_fetch_assoc($result)){
			$temp_arry[] = $row;
		}
	}
	 header('Content-Type: application/json');

	 echo json_encode(array("student"=>$temp_arry));

	 mysqli_close($connect);

}

?>