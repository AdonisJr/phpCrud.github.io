<?php
require ('./connection/database.php');


if(isset($_GET['columnName']) && isset($_GET['orderBy'])){
$columnName = $_GET['columnName'];
$orderBy = $_GET['orderBy'];
        $query_retrieve = "SELECT * FROM register order by $columnName $orderBy";
}else{
        $query_retrieve = "SELECT * FROM register";
}
$sql_retrieve = mysqli_query($connection, $query_retrieve) 
        OR trigger_error('Query FAILED! sql: ${$query_retrieve} ERROR: '. 
                mysqli_error($connection), E_USER_ERROR);
        

?>