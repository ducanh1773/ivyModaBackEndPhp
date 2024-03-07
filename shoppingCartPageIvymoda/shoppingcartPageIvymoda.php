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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT quan_ly_san_pham.anh_sanpham , quan_ly_san_pham.mau_sanpham , quan_ly_san_pham.size_sanpham , san_pham.ten_sanpham , san_pham.gia_sanpham , quanlydonhang.id_sanpham
FROM quan_ly_san_pham INNER JOIN san_pham INNER JOIN quanlydonhang 
WHERE quanlydonhang.id_khachhang = 2147483647
AND quan_ly_san_pham.id_sanpham = san_pham.id_sanpham 
AND quanlydonhang.id_sanpham = quan_ly_san_pham.id_sanpham

";
// Check connection



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $DanhMuc1 = [];

    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_assoc();
        if ($row == null) {
            break;
        }
        $DanhMuc = [
            "id_sanpham" => $row['id_sanpham'],
            "anh_sanpham" => $row['anh_sanpham'],
            "gia_sanpham" => $row['gia_sanpham'],
            "ten_sanpham" => $row['ten_sanpham'],
            "mau_sanpham" => $row['mau_sanpham']
        ];
        $DanhMuc1[] = $DanhMuc;
    }

    echo json_encode($DanhMuc1);

} else {
    echo json_encode([
       
    ]);
}




$conn->close();
?>