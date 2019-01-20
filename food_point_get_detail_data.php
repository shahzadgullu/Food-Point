<?php

$response = array();
 
// include db connect class
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="food_point"; // Database name 
$tbl_name="food_point_detail";
// Create connection
$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT *FROM food_point_detail";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
       $response["all_data"] = array();
 
    while($row = $result->fetch_assoc()) {





    $data = array();
        $data["Reg_id"] = $row["Reg_id"];
        $data["Reg_First_Name"] = $row["Reg_First_Name"];
        $data["Reg_Last_Name"] = $row["Reg_Last_Name"];
        $data["Reg_Mobile_No"] = $row["Reg_Mobile_No"];
        $data["Reg_Email"] = $row["Reg_Email"];
	$data["payment_method"] = $row["payment_method"];
        $data["address"] = $row["address"];
	$data["Reg_No_Dishes"] = $row["Reg_No_Dishes"];
        $data["Reg_Latitude"] = $row["Reg_Latitude"];
        $data["Reg_Longitude"] = $row["Reg_Longitude"];
		
       



// push single product into final response array
        array_push($response["all_data"], $data);
     }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>