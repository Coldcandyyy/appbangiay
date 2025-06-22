<div class="row mb">
    <div class="boxtrai mr">
        <!-- Left content goes here -->
        <div class="banner">
            <div class="slideshow-container">
                <!-- Slides -->
                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="https://bizweb.dktcdn.net/100/340/361/themes/913887/assets/slider_2.jpg?1718951130794" style="width:100%">
                    <div class="text"></div>
                </div>
                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="https://bizweb.dktcdn.net/100/340/361/themes/913887/assets/slider_1.jpg?1718951130794" style="width:100%">
                    <div class="text"></div>
                </div>
                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="https://bizweb.dktcdn.net/100/340/361/themes/913887/assets/slider_3.jpg?1718951130794" style="width:100%">
                    <div class="text"></div>
                </div>
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
        <div class="row product-grid">
            <?php
            $i = 0;
            foreach ($spnew as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $hinh = $img_path . $img;
                if (($i % 3) == 2) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }

                echo '<div class="boxsp ' . $mr . '">
                <div class="row img"><a href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a></div>
                <h3>' . $price . ' VND</h3>
                <a href="' . $linksp . '">' . $name . '</a>
                <div class="row btnaddtocart">
                <form action="index.php?act=addtocart" method="post">
                    <input type="hidden" name="id" value="' . $id . '">
                    <input type="hidden" name="name" value="' . $name . '">
                    <input type="hidden" name="img" value="' . $img . '">
                    <input type="hidden" name="price" value="' . $price . '">
                    <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                </form>
                </div>
                </div>';
                $i += 1;
            }
            ?>
        </div>
    </div>
    <div class="boxphai">
        <!-- Right sidebar content goes here -->
        <?php include("view/boxright.php"); ?>
    </div>
</div>
