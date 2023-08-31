<marquee class="text-dark">
<?php
$db = new mysqli("localhost", "root", "", "web_acc");
$buyers = $db->query("SELECT t.id AS id_transaction, u.username AS ten, p.code as idProduct
FROM transactions t, users u, products p
WHERE t.status = '1' AND t.user_id = u.id AND t.product_id = p.id
ORDER BY t.id DESC LIMIT 10");

if($buyers->num_rows !== 0) {
    while($buyer = $buyers->fetch_assoc()) {
        echo '<span class="text-dark p-2"><b>' . $buyer['ten'] . '</b> vừa mua #' . $buyer['idProduct'] . '</span>';
    }
}


$db->close();
?>

</marquee>