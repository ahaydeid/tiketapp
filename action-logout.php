<?php
    session_start();
    $SESSION['username'] = '';
    unset($SESSION['username']);
    session_unset();
    session_destroy();
    header('Location: Login.php');
?>
