<div class="row mb">
    <div class="boxtitle">TÀI KHOẢN</div>
    <div class="boxcontent formtaikhoan">
        <?php
        if(isset($_SESSION['user'])){
            extract($_SESSION['user']);
            ?>
        <div class="row mb10">
            Xin chào<br />
            <?=$user?>
        </div>
        <div class="row mb10">
            <li>
                <a href="index.php?act=quenmk">Quên mật khẩu</a>
            </li>
            <li>
                <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
            </li>
            <?php if($role==1){ ?>
            <li>
                <a href="admin/index.php">Đăng nhập admin</a>
            </li>
            <?php } ?>

            <li>
                <a href=" index.php?act=thoat">Thoát</a>
            </li>
        </div>
        <?php 
             } else{
                 ?>
        <form action="index.php?act=dangnhap" method="post">
            <div class="row mb10">
                Tên đăng nhập <br />
                <input type="text" name="user" id="" />
            </div>
            <div class="row mb10">
                Mật khẩu <br />
                <input type="password" name="pass" />
            </div>
            <div class="row mb10">
                <input type="checkbox" name="" id="" />Ghi nhớ tài khoản?
            </div>
            <div class="row mb10">
                <input type="submit" value="Đăng nhập" name="dangnhap" />
            </div>
        </form>
        <li>
            <a href="index.php?act=quenmk">Quên mật khẩu</a>
        </li>
        <li>
            <a href="index.php?act=dangky">Đăng ký thành viên</a>
        </li>
        <?php } ?>
    </div>
</div>
<div class="row mb">
    <div class="boxtitle">DANH MỤC</div>
    <div class="boxcontent2 menudoc">
        <ul>
            <?php
            // Kiểm tra biến $dsdm đã được khởi tạo và là mảng hợp lệ
            if (isset($dsdm) && is_array($dsdm)) {
                foreach($dsdm as $dm){
                    extract($dm);
                    $linkdm = "index.php?act=sanpham&iddm=".$id;
                    echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                }
            } else {
                echo '<li>Không có danh mục nào</li>';
            }
            ?>
        </ul>
    </div>
   
</div>
<div class="row">
    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
    <div class="boxcontent row">
        <?php
        // Kiểm tra biến $dstop10 đã được khởi tạo và là mảng hợp lệ
        if (isset($dstop10) && is_array($dstop10)) {
            foreach($dstop10 as $sp){
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=".$id;
                $img = $img_path.$img;
                echo ' <div class="row mb10 top10">
                    <img src="'.$img.'" alt="" />
                    <a href="'.$linksp.'">'.$name.'</a>
                </div>';
            }
        } else {
            echo '<div>Không có sản phẩm nào</div>';
        }
        ?>
    </div>
</div>