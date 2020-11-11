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
    <title>Job-List | EMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!--  
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    -->
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
                    <div class="panel-heading">Dashboard</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                        <li class="list-group-item"><a href="dash.php">View all Employees</a></li>
                        <li class="list-group-item"><a href="add_job.php">Add New Job</a></li>
                        <li class="list-group-item"><a href="job_list.php">View all Jobs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                <?php 
                          $sql = "SELECT * FROM jobs";
                          $result = mysqli_query($conn,$sql);
?>
                <?php
                if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        $sql = "SELECT * FROM jobs WHERE a_job LIKE '%$searchKey%'";
     }else
     $sql = "SELECT * FROM jobs";
     $result = $conn->query($sql);
     ?>
                <div style="float:right;">
                <form action="" method="get">
                <input type="search"  name="search">
                <button type="submit" class="glyphicon glyphicon-search btn btn-success" ></button>
                </form>
                </div>
                    <div class="panel-heading">Job List</div>
                    <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Job</th>
                            <th>Position</th>
                            <th>Details</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <?php
                          if(mysqli_num_rows($result) > 0 ){
                            while($jobs= mysqli_fetch_assoc($result)){?>
                            <tbody>
                            <tr>
                            
                            <td><?php echo $jobs['a_job']; ?></td>
                            <td><?php echo $jobs['a_position']; ?></td>
                            <td><a href="details_job.php?j_id=<?php echo $jobs['j_id']; ?>" class="btn btn-sm btn btn-block btn-info">Details</a></td>
                            <td><a href="edit_job.php?j_id=<?php  echo $jobs['j_id']; ?>" class="btn btn-sm btn btn-block btn-warning">Edit</a></td>
                            <td><a href="delete_job.php?j_id=<?php  echo $jobs['j_id']; ?>" class="btn btn-sm btn btn-block btn-danger">Delete</a></td>
                            </tr>
                            </tbody>
                           <?php }
                           }else{?>
                            <td><?php echo "N/A"; ?></td>
                            <td><?php echo "N/A"; ?></td>
                            <td><?php echo "N/A"; ?></td>
                            <td><?php echo "N/A"; ?></td>
                            <td><?php echo "N/A"; ?></td>
                          <?php  
                           }
                          
                              
                        ?>

                      
                        
                </div>
            </div>
        </div>
    </div>
    
    <!-- main content -->
   

    
    <scrip<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
<script>
    
    $(document).ready(function() {
    $('table.display').DataTable();
} );
</script>