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
    <title>Job details | EMS</title>
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
                    <div class="panel-heading">Job</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_job.php">Add New Job</a></li>
                        <li class="list-group-item"><a href="job_list.php">View all Job</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Job Details</div>
                    <table class="table table-bordered">
                        <?php 
                          $id = $_GET['j_id'];
                          $sql = "SELECT * FROM jobs WHERE j_id =('$id')";
                          $result = mysqli_query($conn,$sql);

                          if(mysqli_num_rows($result) > 0 ){
                            while($employee = mysqli_fetch_assoc($result)){?>
                            <tr>
                            
                            <th style ="width:130px;">Job</th>
                            <td><?php echo $employee['a_job']; ?></td>
                            
                            </tr>
                            <tr>
                            
                            <th style ="width:130px;">Position</th>
                            <td><?php echo $employee['a_position']; ?></td>
                            
                            </tr>
                            <tr>
                            
                            <th style ="width:130px;">Discription</th>
                            <td><?php echo $employee['a_discription']; ?></td>
                            
                            </tr>
                            <td>
                                <a href="edit_job.php?j_id=<?php echo $employee['j_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete_job.php?j_id=<?php echo $employee['j_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>

                           <?php }
                           }else{
                            echo " 0 reult";
                           }
                          
                              
                        ?>

                      
                        </table>
                </div>
            </div>
        </div>
    </div>
    <!-- main content -->

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>