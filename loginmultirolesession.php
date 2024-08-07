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
        $_SESSION['username'] = $fetchResult['username'];
        $_SESSION['role'] = $fetchResult['role'];

        if ($fetchResult['role'] == 'admin') {
            header("Location: admindashboardsession.php");
        } elseif ($fetchResult['role'] == 'user') {
            header("Location: userdashboardsession.php");
        } else {
            echo "Role tidak dikenali.";
            echo "<a href='sessionloginform.html'>Kembali ke Form Login</a>";
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
