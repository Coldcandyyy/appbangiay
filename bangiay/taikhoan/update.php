<?php
if (is_array($taikhoan)) {
    extract($taikhoan);
}
?>
<div class="row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT LẠI TÀI KHOẢN</h1>
    </div>
</div>
<div class="row frmcontent">
    <form action="index.php?act=updatetk" method="post">
        <div class="row mb20">
            Mã tài khoản <br>
            <input type="text" name="id_display" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>" disabled>
            <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
        </div>
        <div class="row mb10">
            Tên đăng nhập <br>
            <input type="text" name="user" value="<?php if (isset($user) && ($user != "")) echo $user; ?>" required>
        </div>
        <div class="row mb10">
            Mật khẩu <br>
            <input type="text" name="pass" value="<?php if (isset($pass) && ($pass != "")) echo $pass; ?>" required>
        </div>
        <div class="row mb10">
            Email <br>
            <input type="email" name="email" value="<?php if (isset($email) && ($email != "")) echo $email; ?>"
                required>
        </div>
        <div class="row mb10">
            Địa chỉ <br>
            <input type="text" name="address" value="<?php if (isset($address) && ($address != "")) echo $address; ?>"
                required>
        </div>
        <div class="row mb10">
            Số điện thoại <br>
            <input type="text" name="tel" value="<?php if (isset($tel) && ($tel != "")) echo $tel; ?>" required>
        </div>
        <div class="row mb10">
            Vai trò <br>
            <input type="text" name="role" value="<?php if (isset($role) && ($role != "")) echo $role; ?>" required>
        </div>
        <div class="row mb10">
            <input type="submit" name="capnhat" value="CẬP NHẬT">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=dskh"><input type="button" value="DANH SÁCH"></a>
        </div>
        <?php
        if (isset($thongbao) && !empty($thongbao)) {
            echo "<div class='thongbao'>{$thongbao}</div>";
        }
        ?>
    </form>
</div>