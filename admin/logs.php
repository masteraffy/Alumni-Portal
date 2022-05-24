<?php 
include('security.php');
include('../includes/header.php');
include('../includes/navbar.php');
include "../dbconfig.php";
?>


<!-- Modal -->
<div class="modal fade bd-example-modal-md" id="addadminprofile" tabindex="-1" role = "dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role = "document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Branch</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="code.php" method="POST">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-12">
                        <label>Branch Name:</label>
                        <input type ="text"  name="Name" class="form-control" placeholder="Enter Branch Name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Branch Address:</label>
                        <input type ="text" name="address"   class="form-control" placeholder="Enter Branch Address">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="branchInsert" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateadminprofile" tabindex="-1" role = "dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role = "document">
  <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Branch</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="code.php" method="POST">
            <div class="modal-body">
                    <input type ="hidden" id="branch_id" name="branch_id" class="form-control" placeholder="Enter Branch Name">

                <div class="row">
                    <div class="form-group col-12">
                        <label>Branch Name:</label>
                        <input type ="text" name="Name" id="Name" class="form-control" placeholder="Enter Branch Name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Branch Address:</label>
                        <input type ="text" name="address" id="address" class="form-control" placeholder="Enter Branch Address">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="branchUpdate" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>
<div class="container-fluid">

<!-- Data tables -->

<div class = "card shadow mb-4">
    <div class = "card-header py-3">
        <h6 class= "m-0 font-weight-bold text-primary">
             System Logs
        <h6>
    </div>

    <div class = "card-body">

    <?php
        if(isset($_SESSION['success']) && $_SESSION['success'] !='')
        {
            echo '<div class="alert alert-success"> '.$_SESSION['success'].' </div>';
            unset($_SESSION['success']); 
        }
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            echo '<div class="alert alert-danger"> '.$_SESSION['status'].' </div>';
            unset($_SESSION['status']); 
        }
    ?>
        <div class= "table-responsive">

        <?php
            $query = "SELECT * FROM logs ORDER BY log_id DESC";
            $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-hover table-bordered dataTableDESC" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Email</th>
                    <th>Movement</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                            <tr>
                                <td> <?php echo $row['log_id']; ?> </td>
                                <td> <?php echo $row['user']; ?> </td>
                                <td> <?php echo $row['movement']; ?> </td>
                                <td> <?php echo $row['movement_date']; ?> </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "No Record Found";
                    }
                ?>                
            </tbody>
        </table>
        </div>
    </div>
</div>

   
<?php 
include('../includes/footer.php'); 
include('../includes/scripts.php');    
?>
