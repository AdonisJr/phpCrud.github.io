<?php
    $host = 'localhost';
    $user = 'root';
    $password = '12345';
    $database = 'php-crud';
    $port = 3307;
    $connection = mysqli_connect($host, $user, $password, $database, $port);

    if (mysqli_connect_error()){
        echo "Error: unable to connect to MySQL Database" . mysqli_connect_error();
    }
?>