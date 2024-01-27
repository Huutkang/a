<?php
require_once 'ketnoi.php';
$cookie_name = "admin";
if (isset($_COOKIE[$cookie_name])){
    $ssmk=true;
    $ktmk=true;
    if (isset($_POST['sp'])){
        $mkc = $_POST['mkc'];
        $mkm = $_POST['mkm'];
        $lmkm = $_POST['lmkm'];
        if ($mkm==$lmkm){
            $user=[];
            $result = $conn->query("SELECT * FROM user");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $m=[];
                    $m[]=$row['username'];
                    $m[]=$row['password_hash'];
                    $user[]=$m;
                }
            } else {
                echo "<p>không có người dùng</p>";
            }
            $username="admin"; // tạm thời
            $mkc = md5($mkc);
            foreach($user as $i){
                if ($i[0]==$username && $i[1]==$mkc){
                    $mkm = md5($mkm);
                    if ($conn->query("UPDATE user SET password_hash = '$mkm' WHERE username = '$username'")) {
                        echo "Cập nhật dữ liệu thành công.";
                    } else {
                        echo "Lỗi cập nhật dữ liệu: " . $conn->error;
                    }
                    header("Location: xem_bieu_mau.php");
                    exit();
                }
            }
            $ktmk=false;
        }
        else{
            $ssmk=false;
        }
    }
}else{
    header("Location: login.php");
    exit();
}

$page="passchange";

require_once 'base_pass.php' 
?>

