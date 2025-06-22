<?php
if(is_array($bl)){
    extract($bl);
}
?>
<div class="row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT BÌNH LUẬN</h1>
    </div>
</div>
<div class="row frmcontent">
    <form action="index.php?act=updatebl" method="post">
        <div class="row mb20">
            Mã loại <br>
            <input type="text" name="maloai" disabled>
        </div>
        <div class="row mb10">
            Tên loại <br>
            <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name;?>">
        </div>
        <div class="row mb10">
            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
            <input type="submit" name="capnhat" value="CẬP NHẬT">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
        </div>
        <?php
        if (isset($thongbao) && !empty($thongbao)) {
            echo "<div class='thongbao'>{$thongbao}</div>";
        }
        ?>
    </form>
</div>