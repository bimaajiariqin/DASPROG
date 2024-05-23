<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
<style>
    /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
}

.container {
    width: 80%;
    margin: auto;
    padding: 20px;
}

header {
    background: #333;
    color: #fff;
    padding: 10px 0;
}

header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    font-size: 24px;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
}

nav ul li a:hover {
    background: #555;
}

section {
    padding: 50px 0;
}

section h2 {
    font-size: 36px;
    margin-bottom: 20px;
}

section p {
    font-size: 18px;
}

</style>
</head>
<body>
    <header>
        <div class="container">
            <h1>My Website</h1>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="view.php">View User</a></li>
                    <li><a href="view_event.php">View Event</a></li>
                    <li><a href="view_tarian.php">View Tarian</a></li>
                    <li><a href="view_transaksi.php">View Transaksi</a></li>
                    <li><a href="view_masukan.php">View Masukan</a></li>
                    <li><a href="index.php">LogIn</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home">
        <div class="container">
            <h2>Selamat Datang Di View Admin <hr>yeayyyyyy</h2>
            <p>This is a simple landing page.</p>
        </div>
    </section>

</body>
</html>
