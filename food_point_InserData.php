<?php

// include db connect class
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="food_point"; // Database name 
$tbl_name="food_point_detail";

$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO $tbl_name (Reg_First_Name,Reg_Last_Name,Reg_Mobile_No,Reg_Email,Reg_No_Dishes,Reg_Latitude,Reg_Longitude,
address,payment_method)VALUES 

('".$_GET["Reg_First_Name"]."','".$_GET["Reg_Last_Name"]."','".$_GET["Reg_Mobile_No"]."','".$_GET["Reg_Email"]."','".$_GET["Reg_No_Dishes"]."','".$_GET["Reg_Latitude"]."','".$_GET["Reg_Longitude"]."','".$_GET["address"]."','".$_GET["payment_method"]."')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>