<?php
session_start();
// Bao gồm tệp chứa các hàm PDO và các mô hình sản phẩm, danh mục
include 'pdo.php'; // Đảm bảo include trước
include "./admin/model/sanpham.php";
include "./admin/model/danhmuc.php";
include "./admin/model/taikhoan.php";
include "view/header.php";
include "view/global.php";

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET["act"];
    switch ($act) {
        case 'sanpham':
            $kyw = $_POST['kyw'] ?? "";
            $iddm = $_GET['iddm'] ?? 0;
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = loadone_ten_dm($iddm);
            include("view/sanpham.php");
            break;

        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                if ($onesp) {
                    $sp_cung_loai = loadone_sanpham_cungloai($id, $onesp['iddm']);
                    include "view/sanphamct.php";
                } else {
                    echo "Không tìm thấy sản phẩm với ID: $id";
                    include "view/home.php";
                }
            } else {
                echo "ID sản phẩm không hợp lệ.";
                include "view/home.php";
            }
            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'] > 0)) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                INSERT_taikhoan($user, $pass, $email, $address, $tel, $role);
                $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng bình luận hoặc đặt hàng!";
            }
            include "view/taikhoan/dangky.php";
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'] > 0)) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location:index.php'); //load lai trang
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui long đăng nhập lại";
                }
            }
            include "view/taikhoan/dangky.php";
            break;

        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'] > 0)) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                $role = $_POST['role'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel, $role);
                $_SESSION['user'] = checkuser($user, $pass);
                header('Location:index.php?act=edit_taikhoan'); //load lai trang
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;

        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'] > 0)) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là:" . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;

        case 'gioithieu':
            include "view/gioithieu.php";
            break;

        case 'thoat':
            if (isset($_GET['act']) && $_GET['act'] == 'thoat') {
                session_unset(); 
                session_destroy(); 
                
            }
            header('Location:index.php');
            break;

            case 'addtocart':
                if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = 1;
                    $ttien = $soluong * $price;
                    $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                    array_push($_SESSION['mycart'],$spadd);
                }
                include "view/cart/viewcart.php";
                break;
            
            
            

            case 'delcart':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    foreach ($_SESSION['mycart'] as $key => $cart) {
                        if ($cart[0] == $id) {
                            unset($_SESSION['mycart'][$key]);
                            break;
                        }
                    }
                } else {
                    $_SESSION['mycart'] = []; // Xóa toàn bộ sản phẩm trong giỏ hàng
                }
                include "view/cart/viewcart.php";
                break;
        case 'lienhe':
            include "view/lienhe.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
?>
