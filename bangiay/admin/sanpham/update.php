<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh = "no photo";
}
?>
<div class="row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT SẢN PHẨM</h1>
    </div>
</div>
<div class="row frmcontent">
    <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
        <div class="row mb10">
            <select name="iddm">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    if ($iddm == $id)
                        echo '<option value="' . $id . '" selected>' . $name . '</option>';
                    else
                        echo '<option value ="' . $id . '">' . $name . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="row mb10">
            Tên sản phẩm <br>
            <input type="text" name="tensp" value="<?= $name ?>">
        </div>
        <div class="row mb10">
            Giá <br>
            <input type="text" name="giasp" value="<?= $price ?>">
        </div>
        <div class="row mb10">
            Hình <br>
            <input type="file" name="hinh">
            <?= $hinh ?>
        </div>
        <div class="row mb10">
            Mô tả <br>
            <textarea name="mota" cols="30" rows="10"><?= $mota ?></textarea>
        </div>
        <div class="row mb10">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="hinh_cu" value="<?= $img ?>">
            <input type="submit" name="capnhat" value="Cập nhật">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
        </div>
        <?php
        if (isset($thongbao) && !empty($thongbao)) {
            echo "<div class='thongbao'>{$thongbao}</div>";
        }
        ?>
    </form>
</div>