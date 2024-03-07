  <?php
header("Content-Type: application/json", true);
header("Access-Control-Allow-Origin: *", true);
header("Referrer-Policy: unsafe-url", true);
header("Access-Control-Allow-Methods: GET, POST, OPTIONS", true);
header("Access-Control-Allow-Headers: *", true);


$ten = "";

$postBody = json_decode(
    file_get_contents('php://input'),
    true
);

if (isset($postBody['name'])) {
    $ten = $postBody['name'];
}



echo (json_encode([
    'id' => 1,
    'name' => "hel" . $ten
]));



$mysqli -> close();




?>