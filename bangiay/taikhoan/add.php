<div class="row">
    <div class="row frmtitle">
        <h1>THÊM MỚI TÀI KHOẢN</h1>
    </div>
</div>
<div class="row frmcontent">
    <form action="index.php?act=addtk" method="post">
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
        <div class="Vai trò">
            Vai trò <br>
            <input type="text" name="role" required>
        </div>
        <br>
        <div class="row mb10">
            <input type="submit" name="themmoi" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=dskh"><input type="button" value="DANH SÁCH"></a>
        </div>
        <?php
        if (isset($thongbao) && !empty($thongbao)) {
            echo "<div class='thongbao'>{$thongbao}</div>";
        }
        ?>
    </form>

</div>