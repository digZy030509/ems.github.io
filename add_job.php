<?php 

require 'conn.php';
session_start();


if( !$_SESSION['u_name'] ){
    header( 'Location: index.php' );
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JOB | EMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- nav -->
    <?php require 'nav.php'; ?>
    <!-- nav -->

    <!-- main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Jobs</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_job.php">Add New Job</a></li>
                        <li class="list-group-item"><a href="job_list.php">View all Jobs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Jobs</div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="a_job" placeholder="Job" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="a_position" placeholder="Position" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="a_discription" placeholder="Discription" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-success" value="Add Job" name="a_add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['a_add'])){
            $a_job =$_POST['a_job'];
            $a_position = $_POST['a_position'];
            $a_discription = $_POST['a_discription'];

            $sql = "INSERT INTO jobs (a_job,a_position,a_discription) VALUES ('$a_job','$a_position','$a_discription')";

            if(mysqli_query($conn,$sql)){
                echo "<script> alert('New record created successfully')</script>";
            }else{
                echo "ERROR:" .$sql.mysqli_error($conn);
            }
        }
    
    ?>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>