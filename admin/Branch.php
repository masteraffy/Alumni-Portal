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
                        <label class="form-label">Branch Name:</label>
                        <input type ="text"  name="Name" class="form-control" id="validateBranchName" placeholder="Enter Branch Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Branch Address:</label>
                        <input type ="text" name="address"   class="form-control" placeholder="Enter Branch Address" required>
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
                        <input type ="text" name="Name" id="Name" class="form-control" placeholder="Enter Branch Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Branch Address:</label>
                        <input type ="text" name="address" id="address" class="form-control" placeholder="Enter Branch Address" required>
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
             List of Branch
            <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#addadminprofile">
                Add Branch
            </button>
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
            $connection = mysqli_connect("localhost", "root", "", "its-alumnitracking");

            $query = "SELECT * FROM branch";
            $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered dataTableASC" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>School</th>
                    <th>Address</th>
                    <th>ACTIONS</th>
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
                                <td> <?php echo $row['Id']; ?> </td>
                                <td> <?php echo $row['Name']; ?> </td>
                                <td> <?php echo $row['Address']; ?> </td>
                                <td>
                                    <button    
                                    data-id="<?php echo $row['Id'];?>"
                                    data-name ="<?php echo $row['Name'];?>"
                                    data-address ="<?php echo $row['Address'];?>"
                                    class="btn btn-success edit_btn"  data-toggle="modal" data-target="#updateadminprofile"> <i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#confirmModal" data-id="<?php echo $row['Id']; ?>">
                                    <i class="far fa-trash-alt"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmModalLabel">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to delete?</h5>
                                            

                                            <form action="code.php" method="POST">
                                            <input type="hidden"  id="delete_id" name="delete_id" value="<?php echo $row['Id']; ?>">
                                            <button type="submit" name="deleteBranch" class="btn btn-danger"> Yes</button>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </td>
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

<script>
    $(document).ready(function(){
        $(".edit_btn").click(function(){
            $("#branch_id").val($(this).data("id"));
            $("#Name").val($(this).data("name"));
            $("#address").val($(this).data("address"));
        });        
        $(".delete").click(function(){
            $("#delete_id").val($(this).data("id"));
            
        });
    });
</script>