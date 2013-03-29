<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    session_destroy();
    mysql_close();
    header("location: ..\login.php");
?>

