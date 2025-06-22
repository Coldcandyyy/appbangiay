<?php
function DELETE_taikhoan($id) {
    $sql = "DELETE FROM taikhoan WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

function loadall_taikhoan() {
    $sql = "SELECT * FROM taikhoan ORDER BY id DESC";
    return pdo_query($sql);
}

function INSERT_taikhoan($user, $pass, $email, $address, $tel, $role) {
    $sql = "INSERT INTO taikhoan (user, pass, email, address, tel, role) VALUES (:user, :pass, :email, :address, :tel, :role)";
    pdo_execute($sql, [
        ':user' => $user,
        ':pass' => $pass,
        ':email' => $email,
        ':address' => $address,
        ':tel' => $tel,
        ':role' => $role
    ]);
}

function checkuser($user, $pass) {
    $sql = "SELECT * FROM taikhoan WHERE user = :user AND pass = :pass";
    return pdo_query_one($sql, [
        ':user' => $user,
        ':pass' => $pass
    ]);
}

function checkemail($email) {
    $sql = "SELECT * FROM taikhoan WHERE email = :email";
    return pdo_query_one($sql, [':email' => $email]);
}

function update_taikhoan($id, $user, $pass, $email, $address, $tel, $role) {
    $sql = "UPDATE taikhoan SET user = :user, pass = :pass, email = :email, address = :address, tel = :tel, role = :role WHERE id = :id";
    pdo_execute($sql, [
        ':id' => $id,
        ':user' => $user,
        ':pass' => $pass,
        ':email' => $email,
        ':address' => $address,
        ':tel' => $tel,
        ':role' => $role
    ]);
}

function loadone_taikhoan($id) {
    $sql = "SELECT * FROM taikhoan WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]);
}