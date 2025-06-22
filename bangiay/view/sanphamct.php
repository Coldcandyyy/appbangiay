<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <?php extract($onesp); ?>
            <div class="boxtitle"><?=$name?></div>
            <div class="row boxcontent">
            <?php
        $img = $img_path . $img;
        echo '<div class="spct"><img src="' . $img . '"><br></div>';
        echo '<h2>' . $price . ' VND</h2>';
        echo '<h3>Mô Tả:</h3>';
        echo '<p>' . $mota . '</p>';
        ?>
        <form action="index.php?act=addtocart" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="name" value="<?=$name?>">
            <input type="hidden" name="price" value="<?=$price?>">
            <input type="hidden" name="img" value="<?=$img?>">
            <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
        </form>

            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#binhluan").load("view/binhluan/binhluanform.php", {
                idpro: <?=$id?>
            });
        });
        </script>
        <div class="row mb" id="binhluan"></div>
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
            <div class="row boxcontent">
                <ul>
                <?php
                foreach($sp_cung_loai as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=".$id;
                    echo '<li><a href="'.$linksp.'">'.$name.'</a></li>';
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include("boxright.php"); ?>
    </div>
</div>
