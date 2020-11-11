<?php require 'conn.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Register</title>
  </head>
  <body>
    

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-4">
                <div class="card bx">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Register | EMS</h4>
                            <p class="card-text small text-muted">Employee Management System</p>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <input type="text" class="form-control form-control-sm" name="u_name" placeholder="Username" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control form-control-sm" name="u_email" placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-sm" name="u_pass" placeholder="Password" required>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-block btn-sm btn-success" name="u_reg" value="Register">
                                    <a href="index.php">Login as Admin</a>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- register -->
    <?php 
    // register
        if(isset($_POST['u_reg'])){
            $u_email = $_POST['u_email'];
            $u_name=$_POST['u_name'];
            $u_pass = $_POST['u_pass'];

            $sql = "INSERT INTO users (u_email,u_name,u_pass) VALUES ('$u_email','$u_name','$u_pass');";

            if(mysqli_query($conn,$sql)){
                echo "<script> alert('Registed Sucessfully')</script>";
            }else{
                echo "ERROR:" .$sql.mysqli_error($conn);
            }
        }
    
    ?>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>