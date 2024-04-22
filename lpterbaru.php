<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');
         

         *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "poppins";
            scroll-behavior: smooth;
         }

         header{
            background:linear-gradient(rgba(0 , 0 , 0, 0)) url("pexels-dio-hasbi-saniskoro-1009949.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
         }

         .container{
            width: 80%;
            margin-inline: auto;
         }

         .navbar{
            padding: 20px 0 20px 0;
         }

         .navbar .box-navbar{
            display: flex;
            justify-content: space-between;
            align-items: center;

         }

         .navbar .box-navbar.menu .logo h1 {
            color: white;
            font-size: 24px;
         }

         .navbar .box-navbar .menu{
            display: flex;
            column-gap: 50px;
         }

         .navbar .box-navbar .menu li{
            list-style-type: none;

         }

         .navbar .box-navbar.menu li a{
            text-decoration: none;
            color: white;
         }




         .hero{
            width: 100%;
            min-height: 100vh;
         }
    </style>
</head>
<body>
<header>
    <div class="navbar">
        <div class="container">
            <div class="box-navbar">
                <div class="logo">
                    <H1>JATIM</H1>
                </div>
                <ul class="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tarian</a></li>
                    <li><a href="#">Tiket</a></li>
                    <li><a href="#">Daftar</a></li>
                </ul>
                
            </div>
        </div>
    </div>


    <div class="hero"></div>
    </header>
</body>
</html>