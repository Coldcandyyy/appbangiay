<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM<strong><?= $tendm ?></strong></div>
            <div class="row boxcontent">
                <div class="product-grid">
                    <?php
                    $i = 0;
                   
                        foreach ($dssp as $sp) {
                            extract($sp);
                            $linksp = "index.php?act=sanphamct&idsp=" . $id;
                            $hinh = $img_path . $img;
                            if (($i == 2) || ($i == 5) || ($i == 8) || ($i == 11)) {
                                $mr = "";
                            } else {
                                $mr = "mr";
                            }
                            echo '<div class="boxsp ' . $mr . '">
                                <div class="img">
                                    <img src="' . $hinh . '" alt="" />
                                    <p>$' . $price . '</p>
                                    <a href="' . $linksp . '">' . $name . '</a>
                                </div>
                            </div>';
                            $i += 1;
                        }
                  
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <!-- Right sidebar content goes here -->
        <?php include("./view/boxright.php"); ?>
    </div>
</div>