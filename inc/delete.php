<?php 
    require ('../connection/database.php');
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        var_dump($id);

        $query_delete = "DELETE FROM register where id = ${id}";
        $sql_delete = mysqli_query($connection, $query_delete ) 
        OR trigger_error("Query FAILED! sql ${query_delete} sql: ".
         mysqli_error($connection), E_USER_ERROR);
        
       echo "<script>alert('Successfully deleted!')</script>";
       echo "<script>window.location.href='../index.php'</script>";
    }
?>