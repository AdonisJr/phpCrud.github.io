<?php 
    session_start();

    function pathTo($destination){
        echo "<script>window.location.href='./$destination.php'</script>";

    }
    if($_SESSION['status'] == 'invalid' or empty($_SESSION['status'])){
        $_SESSION['status'] = 'invalid';
        unset($_SESSION['email']);
        pathTo('login');
    }

?>