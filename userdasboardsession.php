<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
        echo '<h1>Hai, ' . htmlspecialchars($_SESSION['username']) . '</h1><br>';
        echo '<a href="sessionlogout.php">Logout</a>';
    } else {
        header("Location: sessionloginform.html");
        exit();
    }
    ?>
</body>
</html>