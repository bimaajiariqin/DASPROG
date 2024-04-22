<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

//kalau tidak ada id di query string
if(!isset($_GET['id'])){
    header('location:index.php');
}
$id = $_GET['id'];

//fetech user data based on id
$result = mysqli_query($mysqli,"SELECT * FROM user WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
$nama = $user_data['nama']; 
$username = $user_data['username'];
$password = md5($user_data['password']);
$email = $user_data['email']; 
$role = $user_data['role'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header> 
        <h3>Formulir Edit User</h3>
    </header>
    <form method="POST" action="proses_edit_user.php">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
                </tr>
                <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $username;?>"></td>
                </tr>
                <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $password;?>"></td>
                </tr>
                <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $email;?>"></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        <select name="role" id="role" required>
                            <option disabled selected><?php echo $role ?></option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </td>
                </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>