<?php
    /* session_start();
    $_SESSION['nombre'] = 'Alejandro Vázquez';

    if($_SESSION) {

    } else {
        header("Location: index.php"); 
    } */

    if(isset($_POST['ACTION'])) {
        echo 'Cerre sesion';
        
        // destroy de session
        session_start();
        session_destroy();
    }
    
    include_once('login.html');
?>