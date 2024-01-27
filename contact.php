<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="wrap">
        <header id = 'header' class="pc_only">
            <div class="inner fblock">
                <div class="logo">
                    <h1><a href="">
                        <img src="https://thelamp.vn/wp-content/themes/the-lamp/assets/images/logo.png" alt="" width="197" height="55">

                    </a>
                </h1>
                </div>
                <ul class="header_right">
                    <li>
                        <a href=""><img src="https://thelamp.vn/wp-content/themes/the-lamp/assets/images/header_icon02.png" alt="" width="33px"></a>
                    </li>
                    <li><a href=""><img src="https://thelamp.vn/wp-content/themes/the-lamp/assets/images/ico_yt.jpg" alt="" width="33px" style="border-radius: 50%;"></a></li>
                    <li><a href=""><img src="https://thelamp.vn/wp-content/themes/the-lamp/assets/images/header_icon04.png" alt="" width="33px"></a></li>
                </ul>
            </div>
            
        </header>
        <div class="key" style="width: 404px;">
            <img src="https://thelamp.vn/wp-content/themes/the-lamp/assets/images/icon_led.png" alt="" width="300">
            <img src="https://thelamp.vn/wp-content/themes/the-lamp/assets/images/icon_light.png" alt="" class="idx_light">
        </div>
        <div class="main_menu pc_only">
            <div class="inner">
                <ul>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-114 nav-link"><a href="" aria-current="page">About Us</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24 nav-link"><a href="service.html" aria-current="page">Service</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-162 nav-link"><a href="ourproject.html" aria-current="page">Our Project</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22 nav-link"><a href="networking.html" aria-current="page">Networkings</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-249 nav-link"><a href="contact.php" aria-current="page" >Contact</a></li>
                </ul>
            </div>
        </div>
       
    </div>

    <?php
        require_once 'ketnoi.php';
        if (isset($_POST['kh'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Sử dụng prepared statements
        $stmt = $conn->prepare("INSERT INTO kh (name_kh, phone_kh, email_kh, message_kh) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $phone, $email, $message);

        if ($stmt->execute()){
            echo "<h3>Đã gửi thành công. Cảm ơn bạn nhé!</h3>";
        } else {
            echo "<h3>Không gửi được mẫu.</h3>";
        }

        $stmt->close();
        }  
    ?>


    <main id="main">
        <div class="contact_page">
            <div class="container">
                <h3>Contact Us</h3>
                <div class="contact_ifrm">
                    <form method="POST" action="">
                        <div class="modal_frm_item">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <p>Name:</p>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input type="text" name="name" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal_frm_item">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <p>Phone:</p>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input type="text" name="phone" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal_frm_item">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <p>Email:</p>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input  name="email" cols="40" rows="2" class="wpcf7-form-control wpcf7-textare form-control"></input>
                                </div>
                            </div>
                        </div>
                        <div class="modal_frm_item">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <p>Message:</p>
                                </div>
                                <div class="col-12 col-md-10">
                                    <textarea type="text" name="message" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal_frm_item">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                </div>
                                <div class="col-12 col-md-10">
                                   <div class="text-right">
                                        <input type="submit" value="confirm" class="modal_btn" name="kh">
                                   </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="contact_iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.258553930342!2d105.82415007471424!3d21.022338188000145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab02b8eb261d%3A0xbbc740f402f2da6b!2sSPARK%20STARS%20PRODUCTION!5e0!3m2!1svi!2s!4v1705464543973!5m2!1svi!2s" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </main>
    
    <a href="" id="fixed_contact">
        <img src="https://thelamp.vn/wp-content/themes/the-lamp/assets/images/fixed_icon.png" alt="">
    </a>
    <footer id="footer">
        <div id="contact">
            <div class="fblock inner">
                <div class="ft_infor" style="width: 65%;
                max-width: 628px;">
                    <div class="fblock">
                        <div class="ft_ttl01">Contact</div>
                        <div class="ft_ttl02">
                            <strong>Address:</strong>
                            22 Ky Dong, Ward 9, District 3, 
                            <br class="sp_only">
                            Ho Chi Minh City 
                            <br>
                            <strong>Phone:</strong>
                            0329883865
                            <br>
                            <strong>Email:</strong>
                            vinh534473@gmail.com
                            
                        </div>
                    </div>
                </div>
                <div class="ft_logo fblock">
                    <figure>
                        <a href="">
                            <img src="https://thelamp.vn/wp-content/themes/the-lamp/assets/images/ft_logo.png" alt="">
                        </a>
                    </figure>
                    <figure class="totop active">
                        <img src="https://thelamp.vn/wp-content/themes/the-lamp/assets/images/totop.png" alt="">
                    </figure>
                </div>
            </div> 
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="app.js"></script>
</html>