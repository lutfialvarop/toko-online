<?php 
    setcookie('id-admin', '', 0);
    setcookie('key-admin', '', 0);

    header("Location: AdminLogin.php");
    exit;

?>