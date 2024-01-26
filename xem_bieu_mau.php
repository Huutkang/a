<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <link rel="stylesheet" type="text/css" href="bieu_mau.css">
</head>
<body>
    <h1>Thông tin khách hàng</h1>
    

    <?php
    function check_cookie($user, $cookie) {
        foreach ($user as $i) {
            if ($i[0] === $cookie) {
                return true;
            }
        }
        return false;
    }

    // Kết nối đến cơ sở dữ liệu
    require_once 'ketnoi.php';
    $conn->set_charset("utf8mb4");
    $user = [];
    $result = $conn->query("SELECT * FROM cookie");
    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu
        while ($row = $result->fetch_assoc()) {
            $m = [];
            $m[] = $row['cookie'];
            $m[] = $row['username'];
            $user[] = $m;
        }
    } else {
        header("Location: login.php");
        exit();
    }
    $cookie_name = "admin";
    if (isset($_COOKIE[$cookie_name])) {
        if (check_cookie($user, $_COOKIE[$cookie_name])) {
            // Thực hiện truy vấn SQL để lấy dữ liệu
            $result = $conn->query("SELECT * FROM kh");

            // Kiểm tra xem có dữ liệu hay không
            if ($result->num_rows > 0) {
                // Hiển thị dữ liệu
                echo '<table id="b1">';

                echo '<tr>';
                echo '<th>Name</th><th>PHone</th><th>Email</th><th>Message</th>';
                echo '</tr>';
                // 

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo "<td>{$row['name_kh']}</td><td>{$row['phone_kh']}</td><td>{$row['email_kh']}</td><td>{$row['message_kh']}</td>";
                    echo '</tr>';
                }
            } else {
                echo "<p>Không có dữ liệu khách hàng.</p>";
            }

        } else {
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }

    // Đóng kết nối
    $conn->close();
    ?>

    <form method="POST" action="setpass.php">
        <input type="submit" name="sp" value="Thay đổi mật khẩu">
    </form>
    <form method="POST" action="setcookie.php">
        <input type="submit" name="xck" value="Đăng xuất">
    </form>
</body>
</html>
