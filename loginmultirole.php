<?php
include "koneksi.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $stmt = $connect->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $fetchResult = $result->fetch_assoc();

    if ($fetchResult) {
        if ($fetchResult['role'] == 'admin') {
            echo "Berhasil login sebagai Admin";
            echo "<a href='admindashboard.html'>Ke Dashboard Admin</a>";
        } elseif ($fetchResult['role'] == 'user') {
            echo "Berhasil login sebagai Pengguna";
            echo "<a href='userdashboard.html'>Ke Dashboard Pengguna</a>";
        } else {
            echo "Role tidak dikenali.";
            echo "<a href='loginform.html'>Kembali ke Form Login</a>";
        }
    } else {
        echo "Username atau password salah.";
        echo "<a href='loginform.html'>Kembali ke Form Login</a>";
    }
    $stmt->close();
    mysqli_close($connect);
} else {
    echo "Data login tidak lengkap.";
    echo "<a href='loginform.html'>Kembali ke Form Login</a>";
}
?>

