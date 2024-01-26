<?php
require_once 'ketnoi.php';
function generateRandomString($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

if (isset($_POST['ck'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password = md5($password);
    $user=[];
    $result = $conn->query("SELECT * FROM user");
    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu
        while ($row = $result->fetch_assoc()) {
            $m=[];
            $m[]=$row['username'];
            $m[]=$row['password_hash'];
            $user[]=$m;
        }
    } else {
        echo "<p>không có người dùng</p>";
    }
    foreach($user as $i){
        if ($i[0]==$username && $i[1]==$password){
            $cookie_name = "admin";
            $cookie_value = generateRandomString($length = 30);
            setcookie($cookie_name, $cookie_value, time()+(86400*30),"/");
            if ($conn){
                if ($conn -> query("INSERT INTO cookie (cookie, username) VALUES (N'$cookie_value',N'$cookie_name')" )){
                    echo "<h3>đã gửi thành công. cảm ơn bạn nhé</h3>";
                }else{
                    echo "<h3>không gửi được mẫu</h3>";
                }
            }

            header("Location: xem_bieu_mau.php");
            exit();
        }else{
            header("Location: login.php");
            exit();
        }
    }
}

if (isset($_POST['xck'])){
    $cookie_name = "admin";
    if (isset($_COOKIE[$cookie_name])){
        // Sử dụng Prepared Statement để tránh SQL Injection
        $stmt = $conn->prepare("DELETE FROM cookie WHERE cookie = ?");
        $stmt->bind_param("s", $_COOKIE[$cookie_name]);
        $stmt->execute();

        // Kiểm tra và hiển thị kết quả
        if ($stmt->affected_rows > 0) {
            echo "Xóa thành công";
        } else {
            echo "Không có bản ghi nào được xóa hoặc có lỗi xảy ra.";
        }

        // Đóng Prepared Statement
        $stmt->close();

    }

    $cookie_value = "0";
    setcookie($cookie_name, $cookie_value, time()-3600,"/");
}
header("Location: login.php");
exit();
?>