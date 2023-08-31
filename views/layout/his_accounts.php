<?php 
$db = new mysqli("localhost", "root", "", "web_acc");
$user_id = $_SESSION['user']['id'];
$query = "SELECT * FROM transactions WHERE user_id = $user_id ORDER BY id DESC" ;

$products_info = $db->query($query);
$index = 0;
if($products_info->num_rows > 0) {
    echo '
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Tài Khoản</th>
            <th scope="col">Mật Khẩu</th>
            <th cope="col">Thời Gian Mua</th
            </tr>
        </thead>
    <tbody>';
    while($info = $products_info->fetch_assoc()) {
        $index += 1;
        $time = new DateTime($info['created_at']);
        $purchaseTime = $time->format('H:i:s / d-m-Y');
        echo '
            <tr>
                <td scope="row">'.$index.'</td>
                <td scope="row">'.$info['username'].'</td>
                <td scope="row">'.$info['password'].'</td>
                <td scope="row">'.$purchaseTime.'</td>
            </tr>
        ';
    }
    echo '</tbody></table>';
} else {
    echo "ch mua gì cả";
}

?>

