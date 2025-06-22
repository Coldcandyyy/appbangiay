<div class="row">
    <div class="row frmtitle">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row frmcontent">
        <form id="form-them-sp" enctype="multipart/form-data">
            <div class="row mb10">
                Danh mục <br>
                <select name="iddm">
                    <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                    ?>

                </select>
            </div>
            <div class="row mb10">
                Tên sản phẩm <br>
                <input type="text" name="tensp" required>
            </div>
            <div class="row mb10">
                Giá <br>
                <input type="text" name="giasp" required>
            </div>
            <div class="row mb10">
                Hình <br>
                <input type="file" name="hinh" required>
            </div>
            <div class="row mb10">
                Mô tả <br>
                <textarea name="mota" cols="30" rows="10"></textarea>
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && !empty($thongbao)) {
                echo "<div class='thongbao'>{$thongbao}</div>";
            }
            ?>
        </form>
    </div>
</div>
<script>
document.getElementById('form-them-sp').addEventListener('submit', async function(e) {
    e.preventDefault(); // không cho submit vvtruyền thống

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch('/bangiay/api/sanpham/create.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            alert("Thêm sản phẩm thành công!");
            window.location.href = 'index.php?act=listsp';
        } else {
            alert("Lỗi: " + result.message);
        }
    } catch (error) {
        console.error("Lỗi khi gọi API:", error);
        alert("Lỗi không kết nối được đến API.");
    }
});
</script>
