<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
</div>
<div class="row mb10 frmdsloai">
    <table>
        <tr>
            <th></th>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th></th>
        </tr>
        <?php
            // Khởi tạo biến $listdanhmuc như một mảng trống nếu nó chưa được định nghĩa
            if (!isset($listdanhmuc)) {
                $listdanhmuc = array();
            }

            // Kiểm tra nếu $listdanhmuc là mảng hoặc đối tượng
            if (is_array($listdanhmuc) || is_object($listdanhmuc)) {
                foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    $suadm = "index.php?act=suadm&id=".$id;
                    $xoadm = "index.php?act=xoadm&id=".$id;
                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a> <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                    </tr>';
                }
            } else {
                echo '<tr><td colspan="4">Không có danh mục nào.</td></tr>';
            }
            ?>
    </table>
    <input type="button" value="Chọn tất cả">
    <input type="button" value="Bỏ chọn tất cả">
    <input type="button" value="Xóa các mục đã chọn">
    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
</div>
</body>

</html>