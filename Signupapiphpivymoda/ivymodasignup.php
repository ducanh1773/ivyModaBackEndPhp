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


echo "Trang xử lý" . "<br>";
if (!empty($_SERVER['REQUEST_METHOD'])) {
    echo 'prev';
    print_r($_FILES);
}
echo "<br>";



$username = $postBody['username'];
$password = $postBody['password'];


$queryMail = "SELECT * FROM khach_hang WHERE email_khachhang = \"" . $postBody['username'] . "\" ";
$queryPassWord = "SELECT * FROM khach_hang WHERE matkhau_dangnhap = \"" . $postBody['password'] . "\" ";
$count_Mail = $conn->query($queryMail);
$count_PassWord = $conn->query($queryPassWord);

if ($count_Mail > 0 && $count_PassWord > 0) {
    echo json_encode(['success' => true, 'message' => 'Đăng nhập thành công']);
} else {
    echo json_encode(['success' => false, 'message' => 'Đăng nhập thất bại']);
}



// if ($checkEmail == true) {

$sql = "INSERT INTO khach_hang (id_khachhang ,ten_khachhang , sdt_khachhang , email_khachhang ,tuoi ,matkhau_dangnhap)  
VALUES ('" . $postBody['phone'] . "' , '" . $postBody['family' . 'name'] . "' , '" . $postBody['phone'] . "' , '" . $postBody['email'] . "'  , '" . $postBody['age'] . "' , '" . $postBody['password'] . "' ) ";
// }


// $sql = "INSERT INTO donhang (id_donhang , gia_donhang)  
// VALUES ('". $postBody['phone'] ."' , '3') ";
// echo $sql;

echo $postBody['name'];


if ($conn->query($sql) === TRUE)
    // Thông báo nếu thành công
    echo 'Bạn đã đăng ký tài khoản thành công';
else
    // Hiện thông báo khi không thành công
    echo 'Không thành công. Lỗi' . $conn->error;
//ngắt kết nối
$conn->close();
// }


?>