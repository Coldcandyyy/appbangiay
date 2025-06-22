<?php
function INSERT_sanpham($tensp, $giasp, $hinh, $mota, $iddm) {
    $sql = "INSERT INTO sanpham (name, price, img, mota, iddm) VALUES (:name, :price, :img, :mota, :iddm)";
    pdo_execute($sql, ['name' => $tensp, 'price' => $giasp, 'img' => $hinh, 'mota' => $mota, 'iddm' => $iddm]);
}

function DELETE_sanpham($id) {
    $sql = "DELETE FROM sanpham WHERE id = :id";
    pdo_execute($sql, ['id' => $id]);
}

function loadall_sanpham_top10() {
    $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY luotxem DESC LIMIT 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_home() {
    $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY id DESC LIMIT 0,12";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham($kyw = "", $iddm = 0) {
    $params = []; // Khởi tạo mảng $params trước khi sử dụng
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($kyw != "") {
        $sql .= " AND name LIKE :name";
        $params['name'] = "%$kyw%";
    }
    if ($iddm > 0) {
        $sql .= " AND iddm = :iddm";
        $params['iddm'] = $iddm;
    }
    $sql .= " ORDER BY id DESC";
    $listsanpham = pdo_query($sql, $params);
    return $listsanpham;
}


function loadone_ten_dm($iddm) {
    if($iddm > 0){
    $sql = "SELECT * FROM danhmuc WHERE id = :id";
    $dm = pdo_query_one($sql, ['id' => $iddm]);
    extract($dm); 
    return $name;}
    else{
        return "";
    }
}

function loadone_sanpham($id) {
    $sql = "SELECT * FROM sanpham WHERE id = :id";
    $sp = pdo_query_one($sql, ['id' => $id]);
    return $sp;
}

function loadone_sanpham_cungloai($id, $iddm) {
    $sql = "SELECT * FROM sanpham WHERE iddm = :iddm AND id <> :id";
    return pdo_query($sql, ['iddm' => $iddm, 'id' => $id]);
}

function update_sanpham($id, $iddm, $tensp, $giasp, $hinh, $mota) {
    if ($hinh != "") {
        $sql = "UPDATE sanpham SET iddm = :iddm, name = :name, price = :price, mota = :mota, img = :img WHERE id = :id";
        $params = ['iddm' => $iddm, 'name' => $tensp, 'price' => $giasp, 'mota' => $mota, 'img' => $hinh, 'id' => $id];
    } else {
        $sql = "UPDATE sanpham SET iddm = :iddm, name = :name, price = :price, mota = :mota WHERE id = :id";
        $params = ['iddm' => $iddm, 'name' => $tensp, 'price' => $giasp, 'mota' => $mota, 'id' => $id];
    }
    pdo_execute($sql, $params);
}
?>