<?php
    require ('../connection/database.php');
    // require('inc/retrieve.php');

    if (isset($_POST['update'])){
        $id = $_POST['id'];

        $query_update = "SELECT * FROM register WHERE id = '$id'";

        $sql_update = mysqli_query($connection, $query_update)
        OR trigger_error('Query FAILED! sql: ${$query_update} ERROR: '. 
        mysqli_error($connection), E_USER_ERROR);
        $row = mysqli_fetch_assoc($sql_update);

        var_dump($id);
    }

    if(isset($_POST['edit'])){

        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $user_role = $_POST['user_role'];

        $query_update = "UPDATE register SET 
            first_name = '$first_name', 
            last_name = '$last_name', 
            gender = '$gender', 
            user_role = '$user_role' 
        WHERE id = '$id'";


        $sql_update = mysqli_query($connection, $query_update)
        OR trigger_error('Query FAILED! sql: ${$query_update} ERROR: '. 
        mysqli_error($connection), E_USER_ERROR);

        echo "<script> alert('Successfully updated!')</script>";
        echo "<script>window.location.href = '../index.php'</script>";
        
    }
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>
    <h1>Update User</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input value="<?php echo $row['first_name']; ?>" type="text" placeholder="Enter first name" name="first_name" id="first_name" required>
            <input value="<?php echo $row['last_name']; ?>" type="text" placeholder="Enter last name" name="last_name" id="last_name" required>
            <input value="<?php echo $row['email']; ?>" type="email" readonly placeholder="Enter email" name="email" id="email" require>
            <select name="gender" id="gender">
                <option value="">Select gender</option>
                <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected': null ?> >Male</option>
                <option value="Female" <?php echo ($row['gender'] == 'Female')? 'selected': null ?> >Female</option>
            </select>
            <select name="user_role" id="user_role">
                <option value="">Select user role</option>
                <option value="Admin" <?php echo ($row['user_role'] == 'Admin') ? 'selected': null ?> >Admin</option>
                <option value="User" <?php echo ($row['user_role'] == 'User') ? 'selected': null ?>>User</option>
            </select>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

            <input type="submit" name="edit" id="edit" value="Update">

        </form>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>