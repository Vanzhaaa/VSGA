<?php
include 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($password, $row['password'])) {
            if ($row['role'] == 'admin') {
                header("Location: adminDashboard.html");
            } elseif ($row['role'] == 'user') {
                header("Location: userDashboard.html");
            } else {
                echo "Role tidak dikenal.";
            }
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }
} else {
    echo "Data username atau password tidak dikirim.";
}
?>
