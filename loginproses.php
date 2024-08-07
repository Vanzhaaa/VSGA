<?php
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = md5($_POST['password']);
    $query = "SELECT * FROM user WHERE username=? AND password=?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Anda berhasil login ";
        echo "<a href='admindashboard.html'>Admin</a>";
    } else {
        echo "Username atau password salah ";
        echo "<a href='loginForm.html'>Login Form</a>";
    }
    $stmt->close();
    $connect->close();
}
?>
