<?php
    // هذا الكود راح يحذف الجلسة 
    session_start();
    session_destroy();
    header("Location: login.php");
?>