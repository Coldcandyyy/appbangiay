<!-- DANH SÁCH SẢN PHẨM -->
<div class="row">
    <div class="row frmtitle mb">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>

    <!-- FORM LỌC -->
    <form action="index.php?act=listsp" method="post">
        <input type="text" name="kyw" placeholder="Từ khóa tìm kiếm">
        <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
                foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
            ?>
        </select>
        <input type="submit" name="listok" value="GO">
    </form>
</div>

<!-- BẢNG SẢN PHẨM -->
<div class="row mb10 frmdsloai">
    <table id="tbl-sanpham">
        <thead>
            <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN SẢN PHẨM</th>
                <th>HÌNH</th>
                <th>GIÁ</th>
                <th>LƯỢT XEM</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody id="tbody-sanpham">
            <!-- Dữ liệu sẽ được render bằng JavaScript -->
        </tbody>
    </table>

    <input type="button" value="Chọn tất cả">
    <input type="button" value="Bỏ chọn tất cả">
    <input type="button" value="Xóa các mục đã chọn">
    <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
</div>

<!-- SCRIPT GỌI API -->
<script>
  fetch('/bangiay/api/sanpham/get_all.php')
    .then(res => res.json())
    .then(data => {
      let html = '';
      data.forEach(sp => {
        let hinh = sp.img ? `<img src="../upload/${sp.img}" height="80">` : "no photo";
        html += `
          <tr>
            <td><input type="checkbox"></td>
            <td>${sp.id}</td>
            <td>${sp.name}</td>
            <td>${hinh}</td>
            <td>${sp.price}</td>
            <td>${sp.luotxem}</td>
            <td>
              <a href="index.php?act=suasp&id=${sp.id}">
                <input type="button" value="Sửa">
              </a>
              <a href="index.php?act=xoasp&id=${sp.id}">
                <input type="button" value="Xóa">
              </a>
            </td>
          </tr>
        `;
      });
      document.getElementById('tbody-sanpham').innerHTML = html;
    })
    .catch(error => console.error("Lỗi khi lấy sản phẩm:", error));
</script>
