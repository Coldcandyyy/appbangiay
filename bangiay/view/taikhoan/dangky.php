<?php
if(isset($_POST['dangky'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $role = $_POST['role'];
}
?>
<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="row boxcontent formtaikhoan">
                <form action="index.php?act=dangky" method="post">
                    <div class="row mb20">
                        Mã tài khoản <br>
                        <input type="text" name="id" disabled>
                    </div>
                    <div class="row mb10">
                        Tên đăng nhập <br>
                        <input type="text" name="user" required>
                    </div>
                    <div class="row mb10">
                        Mật khẩu <br>
                        <input type="text" name="pass" required>
                    </div>
                    <div class="row mb10">
                        Email <br>
                        <input type="text" name="email" required>
                    </div>
                    <div class="row mb10">
                        Địa chỉ <br>
                        <input type="text" name="address" required>
                    </div>
                    <div class="row mb10">
                        Số điện thoại <br>
                        <input type="text" name="tel" required>
                    </div>
                    <div class="row mb10">
                        Vai trò <br>
                        <input type="text" name="role" required>
                    </div>
                    <div class="row mb10">
                        <input type="submit" value="Đăng ký" name="dangky">
                        <input type="reset" value="Nhập lại">
                    </div>

                </form>
                <h2 class="thongbao">
                    <?php
                if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                }
                ?>
                </h2>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <!-- Right sidebar content goes here -->
        <?php include("./view/boxright.php"); ?>
    </div>
</div>