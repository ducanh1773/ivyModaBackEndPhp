<?php
header("Content-Type: application/json", true);
header("Access-Control-Allow-Origin: *", true);
header("Referrer-Policy: unsafe-url", true);
header("Access-Control-Allow-Methods: GET, POST, OPTIONS", true);
header("Access-Control-Allow-Headers: *", true);

echo json_encode(array('Đầm' , 'Áo cà sa' ,'Tùng Dương' , 'Mono' ,'MTP'));
?>