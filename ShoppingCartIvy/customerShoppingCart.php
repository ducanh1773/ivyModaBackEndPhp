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

$shoppingCartIdProduct = $postBody['id_sanpham'];
$colorShoppingCartProduct = $postBody['mau_sanpham'];
$sizeShoopingProduct = $postBody['size_sanpham'];
$quantityShoppingProduct = $postBody['soluong_sanpham'];


$sql = "SELECT san_pham.id_sanpham , san_pham.ten_sanpham ,
 san_pham.gia_sanpham , quan_ly_san_pham.mau_sanpham , 
 quan_ly_san_pham.size_sanpham , quan_ly_san_pham.soluongconlai 
FROM san_pham INNER JOIN quan_ly_san_pham WHERE 
san_pham.id_sanpham = quan_ly_san_pham.id_sanpham 
AND 
quan_ly_san_pham.mau_sanpham =   \"$colorShoppingCartProduct\"
AND
quan_ly_san_pham.size_sanpham = \"$sizeShoopingProduct\" 
AND
quan_ly_san_pham.soluongconlai >  $quantityShoppingProduct ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $sqlCustomer = "INSERT INTO quanlydonhang (id_donhang, id_sanpham, 
   id_khachhang, soluongmua, size_sanpham, mau_sanpham) 
   VALUES (1,\"$shoppingCartIdProduct\",2147483647,
   $quantityShoppingProduct,\"$sizeShoopingProduct\",\"$colorShoppingCartProduct\")";
    $resultToBuy = $conn->query($sqlCustomer);

    echo 1;
} else {
    echo 0;
}





$conn->close();
?>