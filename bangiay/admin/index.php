<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="../view/csscu.css" />
</head>

<body>
    <?php
    include("../pdo.php");
    include("./model/danhmuc.php");
    include("./model/sanpham.php");
    include("./model/taikhoan.php");
    include("./model/binhluan.php");
    include("./header.php");


    function sanitize($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    if (isset($_GET['act'])) {
        $act = sanitize($_GET['act']);
        switch ($act) {
            case 'adddm':
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $tenloai = sanitize($_POST['tenloai']);
                    INSERT_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/add.php";
                break;

            case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'xoadm':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    DELETE_danhmuc(sanitize($_GET['id']));
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'suadm':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $dm = loadone_danhmuc(sanitize($_GET['id']));
                }
                include "danhmuc/update.php";
                break;

            case 'updatedm':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $id = sanitize($_POST['id']);
                    $tenloai = sanitize($_POST['tenloai']);
                    update_danhmuc($id, $tenloai);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
//  san phAM
            case 'addsp':
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $iddm = sanitize($_POST['iddm']);
                    $tensp = sanitize($_POST['tensp']);
                    $giasp = sanitize($_POST['giasp']);
                    $mota = sanitize($_POST['mota']);
                    $filename = basename($_FILES['hinh']['name']);
                    $target_dir = "../upload/";
                    $target_file = $target_dir . $filename;

                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        INSERT_sanpham($tensp, $giasp, $filename, $mota, $iddm);
                        $thongbao = "Thêm thành công";
                    } else {
                        $thongbao = "Có lỗi xảy ra khi tải lên file.";
                    }
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
                break;

            case 'listsp':
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = sanitize($_POST['kyw']);
                    $iddm = sanitize($_POST['iddm']);
                } else {
                    $kyw = '';
                    $iddm = 0;
                }

                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($kyw, $iddm);
                include "sanpham/list.php";
                break;

            case 'xoasp':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    DELETE_sanpham(sanitize($_GET['id']));
                }
                $listsanpham = loadall_sanpham("", 0);
                include "sanpham/list.php";
                break;

            case 'suasp':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $sanpham = loadone_sanpham(sanitize($_GET['id']));
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
                break;

            case 'updatesp':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $id = sanitize($_POST['id']);
                    $iddm = sanitize($_POST['iddm']);
                    $tensp = sanitize($_POST['tensp']);
                    $giasp = sanitize($_POST['giasp']);
                    $mota = sanitize($_POST['mota']);
                    $hinh = sanitize($_FILES['hinh']['name']);
                    $target_dir = "../upload/";
                    $target_file = $target_dir . $hinh;

                    if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0) {
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                           // $hinh = $hinh;
                        } else {
                            $hinh = $_POST['hinh_cu'];
                        }
                    } else {
                        $hinh = $_POST['hinh_cu'];
                    }

                    update_sanpham($id, $iddm, $tensp, $giasp, $hinh, $mota);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("", 0);
                include "sanpham/list.php";
                break;
// tai khoan


case 'addtk':
    if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        $user = sanitize($_POST['user']);
        $pass = sanitize($_POST['pass']);
        $email = sanitize($_POST['email']);
        $address = sanitize($_POST['address']);
        $tel = sanitize($_POST['tel']);
        $role = sanitize($_POST['role']);
        INSERT_taikhoan($user,$pass, $email, $address, $tel, $role);
        $thongbao = "Thêm thành công";
    }
    include "../taikhoan/add.php";
    break;

case 'dskh':
    $listtaikhoan = loadall_taikhoan();
    include("../taikhoan/list.php");
    break;

case 'xoatk':
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id']; // Gán giá trị cho biến $id
        DELETE_taikhoan($id);
    }
    $listtaikhoan = loadall_taikhoan();
    include "../taikhoan/list.php";
    break;

case 'suatk':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $taikhoan = loadone_taikhoan(sanitize($_GET['id']));
        }
        include "../taikhoan/update.php";
        break;

        case 'updatetk':
            if (isset($_POST['capnhat'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
    
                update_taikhoan($id, $user, $pass, $email, $address, $tel, $role);
                $thongbao = "Cập nhật tài khoản thành công";
                header("Location: index.php?act=dskh");
                include "../taikhoan/list.php";
                exit();
            }
            break;

       case 'dsbl':
                $listbinhluan = loadall_binhluan(0);
                include("./binhluan/list.php");
                break;
        case 'xoabl':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        DELETE_binhluan(sanitize($_GET['id']));
                    }
                    $listbinhluan = loadall_binhluan($idpro);
                    include "danhmuc/list.php";
                    break;


    default:
    include('home.php');
    break;
    }
    } else {
    include('home.php');
    }
    
    include("./footer.php");
    ?>
</body>

</html>