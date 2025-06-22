<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
</div>
<div class="row mb10 frmdsloai">
    <table>
        <tr>
            <th></th>
            <th>Mã TÀI KHOẢN</th>
            <th>TÊN ĐĂNG NHẬP</th>
            <th>MẬT KHẨU</th>
            <th>EMAIL</th>
            <th>ĐỊA CHỈ</th>
            <th>ĐIỆN THOẠI</th>
            <th>VAI TRÒ</th>
            <th></th>
        </tr>
        <?php
            // Kiểm tra nếu $listdanhmuc là mảng hoặc đối tượng
            if (is_array($listtaikhoan) || is_object($taikhoan)) {
                foreach($listtaikhoan as $taikhoan){
                    extract($taikhoan);
                    $suatk = "index.php?act=suatk&id=".$id;
                    $xoatk = "index.php?act=xoatk&id=".$id;
                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$user.'</td>
                        <td>'.$pass.'</td>
                        <td>'.$email.'</td>
                        <td>'.$address.'</td>
                        <td>'.$tel.'</td>
                        <td>'.$role.'</td>
                        <td><a href="'.$suatk.'"><input type="button" value="Sửa"></a> <a href="'.$xoatk.'">
                        <input type="button" value="Xóa"></a></td>
                    </tr>';
                }
            } else {
                echo '<tr><td colspan="4">Không có danh mục nào.</td></tr>';
            }
            ?>
    </table>
    <br>

    <input type="button" value="Chọn tất cả">
    <input type="button" value="Bỏ chọn tất cả">
    <input type="button" value="Xóa các mục đã chọn">
    <a href="index.php?act=addtk"><input type="button" value="Nhập thêm"></a>
</div>
</body>

</html>