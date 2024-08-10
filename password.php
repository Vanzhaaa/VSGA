<?php
$new_password = 'vanzhaa_'; // Password baru
$hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

echo $hashed_password;
?>
