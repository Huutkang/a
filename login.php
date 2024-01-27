<?php
require_once 'ketnoi.php';

$page="login";
function generateRandomString($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

$ktmk=true;

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
            setcookie($cookie_name, $cookie_value, time()+86400*30,"/");
            if ($conn){
                if ($conn -> query("INSERT INTO cookie (cookie, username) VALUES (N'$cookie_value',N'$cookie_name')" )){
                    echo "<h3>đã gửi thành công. cảm ơn bạn nhé</h3>";
                }else{
                    echo "<h3>không gửi được mẫu</h3>";
                }
            }

            header("Location: xem_bieu_mau.php");
            exit();
        }
    }
    $ktmk=false;
}

?>
<?php
    require_once 'base_pass.php' 
?>
