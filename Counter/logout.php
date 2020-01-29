<?php

/**
 * @author 
 * @copyright 2013
 */

    session_start();

    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['poli']);
    header('Location: login.php');
     exit();

?>