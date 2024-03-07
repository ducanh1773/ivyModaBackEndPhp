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



$id = $postBody['id_sanpham'];


$sql = "SELECT san_pham.id_sanpham , ten_sanpham , gia_sanpham , anh_sanpham  FROM san_pham INNER JOIN quan_ly_san_pham WHERE san_pham.id_sanpham = quan_ly_san_pham.id_sanpham AND san_pham.id_sanpham = \"" . $postBody['id_sanpham'] . "\" ";
// $queryPassWord = "SELECT * FROM khach_hang WHERE matkhau_dangnhap = \"".$postBody['password']."\" ";
$result = $conn->query($sql);
// $count_PassWord = $conn->query($queryPassWord);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    echo json_encode([
        'id_sanpham' => $row['id_sanpham'],
        'anh_sanpham' => $row['anh_sanpham'],
        'ten_sanpham' => $row['ten_sanpham'],
        'gia_sanpham' => $row['gia_sanpham']

    ]);


} else {
    echo json_encode([
        "sanpham" => null
    ]);
}

$conn->close();

?>