<?php
require_once("../library/message.php");
session_start();

$db = new mysqli("localhost", "root", "", "web_acc");
$request = file_get_contents("php://input"); //lấy data phần thân, POST-PUT
$result = json_decode($request);
$idProduct = trim($db->real_escape_string($result->id));

if(!isset($_SESSION['user'])) {
    Message::errorClose("Bạn Chưa Đăng Nhập!", $db);
}

if(intval($idProduct) == 0) {
    Message::errorClose("cho t cái đại chỉ?", $db);
}
//1. KIỂM TRA SẢN PHẨM CÓ TỒN TẠI VÀ CÒN HÀNG KHÔNG !!!
$product = $db->query("SELECT * FROM products Where id = $idProduct");
if($product->num_rows == 0) {
    Message::errorClose("Sản phẩm không tồn tại hoặc đã bán!", $db);
}

//2. KIỂM TRA USER CÓ ĐỦ TIỀN ĐỂ MUA HAY KHÔNG !!!
$price_product = $product->fetch_assoc()['price'];
$vnd_user = $_SESSION['user']['vnd'];

if($price_product > $vnd_user) {
    Message::errorClose("Bạn không đủ tiền, vui lòng nạp thêm tiền để mua sản phẩm !", $db);
}

//3. OK
$idUser = $_SESSION['user']['id'];

$db->begin_transaction();
try {
    
    // Insert Table Transaction
    $db->query("INSERT INTO transactions (`user_id`, `product_id`, `price`) VALUES (".$idUser.", $idProduct, $price_product)");

    // Update Table Products
    $db->query("UPDATE products SET status = 0 WHERE id = $idProduct ");

    // Update Table Users
    $db->query("UPDATE users SET vnd = (vnd - $price_product) WHERE id = '$idUser'");

    // Commit giao dịch nếu không có lỗi
    $db->commit();

    //Message::successClose("Mua Thành Công", $db);
} catch (Exception $e) {
    // Rollback giao dịch nếu có lỗi
    $db->rollback();
    echo "Có lỗi xảy ra: " . $e->getMessage();
}

// SET lại SESSION
print_r($idUser); // ra
$user = $db->query("SELECT * FROM users WHERE users.id = $idUser");
$user_ = $user->fetch_assoc();
if($user_ !== null) {
    $_SESSION['user']['vnd'] = $user_['vnd'];
} else {
    echo "kh vo dc";
}

Message::success("Mua Thành Công");

$db->close();

?>