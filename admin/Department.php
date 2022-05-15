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
            <h5 class="modal-title" id="exampleModalLabel">Create Deparment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="code.php" method="POST">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-12">

                        <label>School Branch:</label>
                            <select name="branch"  id="insert_branch"  class="form-control">
                                    <option value="">Select Branch</option>
                                    <?php
                                        $query = "SELECT * FROM branch";
                                        $branch = mysqli_query($connection, $query);
                                        if(mysqli_num_rows($branch) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($branch))
                                            {
                                                echo$row['Name'];
                                    ?>
                                                <option value=<?php echo $row['Id']; ?>><?php echo $row['Name']." - ".$row['Address']?></option>
                                    <?php
                                            }
                                        }
                                    ?>    
                            </select> 
                        </div>
                    <div class="form-group col-12">
                        <label>Department Name:</label>
                        <input type ="text"  name="Name" oninput="this.value = this.value.replace(/[^a-z, ]/, '')" class="form-control text-capitalize" placeholder="Enter Department Name" required />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Description:</label>                        
                        <textarea name="address"  class="form-control"></textarea>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="departmentInsert" class="btn btn-primary">Save</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="code.php" method="POST">
            <div class="modal-body">
                    <input type ="hidden" id="branch_id" name="branch_id" class="form-control" placeholder="Enter Department Name" required>
                    <div class="form-group col-12 p-0">

                        <label>School Branch:</label>
                            <select name="branch"  id="insert_branch"  class="form-control">
                                  
                             <option id="branchSelected"></option>
                                    <?php
                                        $query = "SELECT * FROM branch";
                                        $branch = mysqli_query($connection, $query);
                                        if(mysqli_num_rows($branch) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($branch))
                                            {
                                                echo$row['Name'];
                                    ?>
                                                <option value=<?php echo $row['Id']; ?>><?php echo $row['Name']." - ".$row['Address']?></option>
                                    <?php
                                            }
                                        }
                                    ?>    
                            </select> 
                        </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Department Name:</label>
                        <input type ="text" name="Name" id="Name" oninput="this.value = this.value.replace(/[^a-z, ]/, '')" class="form-control text-capitalize" placeholder="Ex: School of Computer Science" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Description:</label>
                        <textarea name="address" id="address" placeholder="Enter Description" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="departmentUpdate" class="btn btn-primary">Save</button>
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
            List of Departments
            <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#addadminprofile">
                Add Department
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

            $query = "SELECT * FROM departments";
            $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered dataTableASC" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Campus Department</th>
                    <th>Description</th>
                    <th>Actions</th>
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
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['Name']; ?> </td>
                                <td> <?php echo $row['Description']; ?> </td>
                                <td>
                                    <button    
                                    data-id="<?php echo $row['id'];?>"
                                    data-name ="<?php echo $row['Name'];?>"
                                    data-description ="<?php echo $row['Description'];?>"
                                    data-branchid="<?php echo $row['branch_id'];?>"
                                    data-branch="<?php 
                                    $query = "SELECT * FROM branch WHERE Id=".$row['branch_id'];
                                    $branchName = mysqli_query($connection, $query);
                                    if(mysqli_num_rows($branchName) > 0)
                                    {
                                        while($row_branch = mysqli_fetch_assoc($branchName))
                                        {
                                            echo $row_branch['Name']." ".$row_branch['Address'];
                                        }
                                    }     
                                    ?>"

                                    class="btn btn-success edit_btn"  data-toggle="modal" data-target="#updateadminprofile"> <i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#confirmModal" data-id="<?php echo $row['id']; ?>">
                                    <i class="far fa-trash-alt"> </i>
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
                                                <input type="hidden"  id="delete_id" name="delete_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="deleteDepartment" class="btn btn-danger">Yes</button>
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
            $("#address").html($(this).data("description"));
            $("#branchSelected").val($(this).data("branchid"));
            $("#branchSelected").html($(this).data("branch"));
        }); 
        $(".delete").click(function(){
            $("#delete_id").val($(this).data("id"));
            
        });
    });
</script>