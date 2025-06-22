<?php
require_once '../../pdo.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Chỉ chấp nhận POST']);
    exit;
}

$tensp = $_POST['tensp'] ?? '';
$giasp = $_POST['giasp'] ?? '';
$mota = $_POST['mota'] ?? '';
$iddm = $_POST['iddm'] ?? '';
$img = $_FILES['hinh'] ?? null;

if ($img && $img['error'] === 0) {
    $target_dir = "../../upload/";
    $img_name = basename($img["name"]);
    $target_file = $target_dir . $img_name;

    if (move_uploaded_file($img["tmp_name"], $target_file)) {
        $sql = "INSERT INTO sanpham (name, price, img, mota, iddm) VALUES (?, ?, ?, ?, ?)";
        pdo_execute($sql, [$tensp, $giasp, $img_name, $mota, $iddm]);

        echo json_encode(['success' => true]);
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Lỗi upload hình ảnh']);
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Hình ảnh không hợp lệ']);
    exit;
}
