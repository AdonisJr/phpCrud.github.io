<?php 
        require('inc/retrieve.php');
        require('inc/session.php');
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

<title>CRUD</title>
</head>
<body>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h1 class="text-center">List of Users</h1>
        <form action="/inc/logout.php" method="post">
            <div class="d-flex align-items-center gap-3">
                <h5>Welcome! <a><?php echo $_SESSION['user_role'] ?></a> <a href=""><?php echo $_SESSION['email'] ?></a></h5>
                <button name="logout" type="submit" class="btn btn-danger">Logout</button>
            </div>
        </form>
    </div>
    <div class="card-body">
            <div class="container d-flex flex-column justify-content-center">
            <label for="" class="mt-5">Sort by</label><select name="sort" id="sort" class="w-25">Sort by
                <option value="first_name">Name</option>
                <option value="last_name">Last Name</option>
                <option value="email">Email</option>
                <option value="gender">Gender</option>
                <option value="user_role">User Role</option>
            </select>
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>
                        <a href="?columnName=first_name&orderBy=ASC">
                                First Name
                                <i class="fa fa-fw fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="?columnName=last_name&orderBy=ASC">
                            Last Name
                                <i class="fa fa-fw fa-sort"></i>
                            </a>
                        </th>
                        <th>
                        <a href="?columnName=email&orderBy=ASC">
                                Email
                                <i class="fa fa-fw fa-sort"></i>
                            </a>
                        </th>
                        <th>
                        <a href="?columnName=gender&orderBy=ASC">
                                Gender
                                <i class="fa fa-fw fa-sort"></i>
                            </a>
                        </th>
                        <th>
                        <a href="?columnName=user_role&orderBy=ASC">
                                User Role
                                <i class="fa fa-fw fa-sort"></i>
                            </a>
                        </th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        while ($row = mysqli_fetch_array($sql_retrieve)){
                            ?>
                            <tr>
                                <td><?php echo $row['first_name'] ?></td>
                                <td><?php echo $row['last_name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['user_role'] ?></td>

                                <td>
                                    <form action="./inc/update.php" method="post">
                                        <button type="submit" name="update" id="update" class="btn">
                                            <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                        </button>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    </form>
                                    
                                </td>

                                <td style="display: <?php echo $_SESSION['user_role'] == 'User' ? 'none' : 'flex' ?>" >

                                    <form action="./inc/delete.php" method="post">
                                        <button onclick="return confirm('Are you sure you want to delete? ')" type="submit" name="delete" class="btn">
                                            <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                            ?>

                </tbody>
                <tfoot>
                        
                </tfoot>
            </table>
        
        </div>
    </div>
    <ul class="pagination d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
    </ul>
</div>

<!-- create account -->

               
    <form  action="./inc/create.php" method="post" class="d-flex justify-content-center my-5">
       
        <div style="display: <?php echo $_SESSION['user_role'] == 'User' ? 'none' : 'flex' ?>" class="card w-50">
            
        <div class="card-header">
                <h3>Create User</h3>
            </div>
            <div class="card-body d-flex flex-column gap-2">
                <input class="form-control" type="text" placeholder="Enter first name" name="first_name" id="first_name" required>
                <input class="form-control" type="text" placeholder="Enter last name" name="last_name" id="last_name" required>
                <input class="form-control" type="email" placeholder="Enter email" name="email" id="email" require>
                <input class="form-control" type="password" placeholder="Enter password" name="password" id="password" require>
                <select class="form-control" name="gender" id="gender">
                    <option value="">Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <select class="form-control " name="user_role" id="user_role">
                    <option value="">Select user role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>

                <input class="form-control btn btn-success" type="submit" name="create" value="Create">
            </div>
        </div>
        

    </form>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>