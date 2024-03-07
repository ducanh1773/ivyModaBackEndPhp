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
$collectionName = $postBody['tenLoaiSanPham'];
$arrangeColectionAPI = $postBody['selOrder'];

$sql = "SELECT san_pham.id_sanpham , ten_sanpham , gia_sanpham , anh_sanpham  FROM san_pham INNER JOIN quan_ly_san_pham WHERE san_pham.id_sanpham = quan_ly_san_pham.id_sanpham AND san_pham.ten_sanpham LIKE  \"%" . $postBody['tenLoaiSanPham'] . "%\" ";


$sqlNewArrival = "SELECT san_pham.id_sanpham , ten_sanpham , gia_sanpham , anh_sanpham  FROM san_pham INNER JOIN quan_ly_san_pham WHERE san_pham.id_sanpham = quan_ly_san_pham.id_sanpham AND san_pham.ten_sanpham LIKE  \"%" . $postBody['tenLoaiSanPham'] . "%\" ORDER BY san_pham.id_sanpham DESC";
$sqlArrangePriceDesc = "SELECT san_pham.id_sanpham , ten_sanpham , gia_sanpham , anh_sanpham  FROM san_pham INNER JOIN quan_ly_san_pham WHERE san_pham.id_sanpham = quan_ly_san_pham.id_sanpham AND san_pham.ten_sanpham LIKE  \"%" . $postBody['tenLoaiSanPham'] . "%\" ORDER BY san_pham.gia_sanpham DESC";
$sqlArrangePriceAsc = "SELECT san_pham.id_sanpham , ten_sanpham , gia_sanpham , anh_sanpham  FROM san_pham INNER JOIN quan_ly_san_pham WHERE san_pham.id_sanpham = quan_ly_san_pham.id_sanpham AND san_pham.ten_sanpham LIKE  \"%" . $postBody['tenLoaiSanPham'] . "%\" ORDER BY san_pham.gia_sanpham ASC";




if ($arrangeColectionAPI == '') {
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
            ];
            $DanhMuc1[] = $DanhMuc;
        }

        echo json_encode($DanhMuc1);

    } else {
        echo json_encode([

        ]);
    }

} else if ($arrangeColectionAPI == 'Auto') {
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
            ];
            $DanhMuc1[] = $DanhMuc;
        }

        echo json_encode($DanhMuc1);

    } else {
        echo json_encode([

        ]);
    }
} else if ($arrangeColectionAPI == 'price_desc') {
    $result = $conn->query($sqlArrangePriceDesc);
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
            ];
            $DanhMuc1[] = $DanhMuc;
        }

        echo json_encode($DanhMuc1);

    } else {
        echo json_encode([

        ]);
    }
} else if ($arrangeColectionAPI == 'price_asc') {
    $result = $conn->query($sqlArrangePriceAsc);
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
            ];
            $DanhMuc1[] = $DanhMuc;
        }

        echo json_encode($DanhMuc1);

    } else {
        echo json_encode([

        ]);
    }
} else if ($arrangeColectionAPI == 'NewArrival') {
    $result = $conn->query($sqlNewArrival);
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
            ];
            $DanhMuc1[] = $DanhMuc;
        }

        echo json_encode($DanhMuc1);

    } else {
        echo json_encode([

        ]);
    }
}



$conn->close();
?>