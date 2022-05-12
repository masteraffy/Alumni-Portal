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
            <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="code.php" method="POST">
            <div class="modal-body">
                <div class="row">                    
                    <div class="form-group col-12">
                        <label>School Deparment:</label>
                        <select name="department" required class="form-control checkBranch">
                            <option value="">Select Department</option>
                            <?php
                                $query = "SELECT * FROM departments";
                                $branch = mysqli_query($connection, $query);
                                if(mysqli_num_rows($branch) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($branch))
                                    {
                            ?>
                                        <option class="<?php echo "checkershowed show_".$row['branch_id']; ?>" 
                                        data-id=<?php echo $row['branch_id']; ?>
                                        value=<?php echo $row['id']; ?>><?php echo $row['Name']?></option>
                            <?php
                                    }
                                }
                            ?>    
                        </select>                
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Course Name:</label>
                        <input type ="text" required name="Name" class="form-control" placeholder="Enter Course Name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Course Abbv:</label>                          
                        <input type ="address"  name="address" class="form-control" placeholder="Ex: BSIT">     


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="courseInsert" class="btn btn-primary">Save</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="code.php" method="POST">
            <div class="modal-body">
                    <input type ="hidden" id="branch_id" name="branch_id" class="form-control" placeholder="Enter Branch Name">
                <div class="row">
                <div class="form-group col-12">
                        <label>School Deparment:</label>
                        <select name="department" required id="department" class="form-control checkBranch">
                            <option id="departSelected"></option>
                            <?php
                                $query = "SELECT * FROM departments";
                                $branch = mysqli_query($connection, $query);
                                if(mysqli_num_rows($branch) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($branch))
                                    {
                            ?>
                                        <option class="<?php echo "checkershowed show_".$row['branch_id']; ?>" value=<?php echo $row['id']; ?>><?php echo $row['Name']?></option>
                            <?php
                                    }
                                }
                            ?>    
                        </select>                
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Course Name:</label>
                        <input type ="text" required name="Name" id="Name" class="form-control" placeholder="Enter Branch Name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Course Abbv:</label>                          
                        <input type ="text" id="abvC" name="address" class="form-control" placeholder="Ex: BSIT">  
                       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="courseUpdate" class="btn btn-primary">Save</button>
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
            List of Course
            <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#addadminprofile">
                Add Course
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

            $query = "SELECT * FROM course";
            $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
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
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['title']; ?> </td>
                                <td> <?php echo $row['code']; ?> </td>
                                <td>
                                    <button    
                                    data-id="<?php echo $row['id'];?>"
                                    data-name ="<?php echo $row['title'];?>"
                                    data-description ="<?php echo $row['code'];?>"

                                    data-departmentid="<?php echo $row['dep_id'];?>"
                                  
                                    data-department="<?php 
                                        $query = "SELECT * FROM departments WHERE id=".$row['dep_id'];
                                        $deparmentName = mysqli_query($connection, $query);
                                        if(mysqli_num_rows($deparmentName) > 0)
                                        {
                                            while($row_dept = mysqli_fetch_assoc($deparmentName))
                                            {
                                                echo $row_dept['Name'];
                                            }
                                        }     
                                    ?>"




                                    class="btn btn-success edit_btn"  data-toggle="modal" data-target="#updateadminprofile"> <i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#confirmModal" data-id="<?php echo $row['id']; ?>">
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
                                            <input type="hidden" id="delete_id" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="deleteCourse" class="btn btn-danger"> Yes</button>
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
            $("#abvC").val($(this).data("description"));
            $("#departSelected").val($(this).data("departmentid"));
            $("#departSelected").html($(this).data("department"));
        }); 
        $(".delete").click(function(){
            $("#delete_id").val($(this).data("id"));
            
        });
    });
</script>