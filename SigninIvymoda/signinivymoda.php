<?php
header("Content-Type: application/json", true);
header("Access-Control-Allow-Origin: *", true);
header("Referrer-Policy: unsafe-url", true);
header("Access-Control-Allow-Methods: GET, POST, OPTIONS", true);
header("Access-Control-Allow-Headers: *", true);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productivyoda";

$postBody = json_decode(
    file_get_contents('php://input'),
    true
);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

if(!empty($_SERVER['REQUEST_METHOD'])) {
    // echo 'prev';
    //print_r($_FILES);
}




$CheckAccount = false;
$CheckPassWordSignIn = false;

$checkMail = '1231231231';
if(isset($postBody['username'])) {

}



if(isset($postBody['password'])) {

}




$queryMail = "SELECT * FROM khach_hang WHERE email_khachhang = \"".$postBody['username']."\" AND matkhau_dangnhap = \"".$postBody['password']."\" ";
// $queryPassWord = "SELECT * FROM khach_hang WHERE matkhau_dangnhap = \"".$postBody['password']."\" ";
$count_Mail = $conn->query($queryMail);
// $count_PassWord = $conn->query($queryPassWord);

$tc = $count_Mail->num_rows > 0;
$conn->close();

echo json_encode([
    "tc" => $tc

]);




?>