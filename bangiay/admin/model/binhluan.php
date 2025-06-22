<?php
function INSERT_binhluan($noidung, $iduser, $idpro, $ngaybinhluan) {
    // Kết nối đến cơ sở dữ liệu (sử dụng PDO cho ví dụ này)
    $pdo = new PDO('mysql:host=localhost;dbname=baitaplon', 'root', '');
    
    // Chuẩn bị câu SQL với prepared statement
    $sql = "INSERT INTO binhluan (noidung, iduser, idpro, ngaybinhluan) VALUES (:noidung, :iduser, :idpro, :ngaybinhluan)";
    $stmt = $pdo->prepare($sql);
    
    // Định nghĩa các tham số và gán giá trị
    $params = [
        ':noidung' => $noidung,
        ':iduser' => $iduser,
        ':idpro' => $idpro,
        ':ngaybinhluan' => $ngaybinhluan, // Đảm bảo rằng $ngaybinhluan có định dạng 'YYYY-MM-DD HH:MM:SS'
    ];
    
    // Thực thi câu lệnh SQL với các tham số đã chuẩn bị
    $stmt->execute($params);
}
function loadall_binhluan($idpro){
    $sql = "SELECT * FROM binhluan WHERE 1";
    if($idpro>0) $sql .="  AND idpro = '".$idpro."';
    $sql .= ORDER BY id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}
function DELETE_binhluan($id){
    $sql = "DELETE FROM binhluan WHERE id =".$_GET['id'];
    pdo_execute($sql);


}
?>