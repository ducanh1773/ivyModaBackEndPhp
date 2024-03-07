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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_sanpham = $postBody['id_sanpham'];
$id_khachhang = $postBody['id_khachhang'];

$sql = "SELECT * FROM quanlysanphamyeuthich 
WHERE id_sanpham =" . $postBody['id_sanpham'] . "
AND id_khachhnang = 2147483647";

$result = $conn -> query($sql);




$conn->close();

?>