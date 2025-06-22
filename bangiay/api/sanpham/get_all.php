<?php
require_once '../../pdo.php'; 

header('Content-Type: application/json');

try {
    $sql = "SELECT * FROM sanpham";
    $products = pdo_query($sql);
    echo json_encode($products);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
