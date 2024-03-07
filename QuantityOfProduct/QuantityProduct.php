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

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id_donhang , id_sanpham , id_khachhang from quanlydonhang 
WHERE id_donhang = 1 AND id_khachhang = 2147483647";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo $result->num_rows;
} else {
    echo 0;
}

$conn->close();
?>