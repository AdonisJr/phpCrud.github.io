<?php 
    require ('../connection/database.php');
    session_start();

    if(isset($_POST['login'])){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if($email == '' || $password == ''){
           echo  "<script>Alert('Please fill up the email and password.')</script>";
           
        }else{
            $check_query = "SELECT * FROM register where email = '$email'";
            
            $query_match = mysqli_query($connection, $check_query);
            $row = mysqli_fetch_array($query_match);
            
            $current_password = $row['password'];
            
            if (mysqli_num_rows($query_match) > 0 && password_verify($password, $current_password)){
                $_SESSION['status'] = 'valid';
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_role'] = $row['user_role'];
                echo "<script>window.location.href = '../index.php'</script>";
            }else{
                $_SESSION['status'] = 'invalid';
                echo "<script>alert('Login failed')</script>";
                echo "<script>window.location.href = './login.php'</script>";
            }
        }
    }
    else{
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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<title>Login</title>
</head>
<body>
    
<div class="container">
    <h2>Login</h2>
    <form action="./login.php" method="post">
        <input type="email" name="email" placeholder="Enter Email">
        <input type="password" name="password" id="password" placeholder="Enter password">
        <input type="submit" value="Login" name="login">
    </form>
</div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>