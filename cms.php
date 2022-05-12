<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');


$columnname = "username";

$connection = mysqli_connect("localhost", "root", "", "adminpanel");
$query = "SELECT * FROM register";
$query_run = mysqli_query($connection, $query);

?>

<!-- Modal -->
<div class="modal fade" id="addcontent" tabindex="-1" role = "dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role = "document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Content Management </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="cmscode.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type ="text" name="title" class="form-control" placeholder="Enter Title">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter Description" rows="10" ></textarea>
                </div>

                <div class="form-group">
                    <label>CreatedBy</label>
                    <select name="createdby" class="form-control">
                        <?php
                            if($query_run)
                            {
                                while($row = mysqli_fetch_array($query_run))
                                {
                                    $stname = $row["$columnname"];
                                    
                                        echo"<option> $stname<br></option>";
                                    
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addbtn" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Data tables -->
<div class="container-fluid">

<div class = "card shadow mb-4">
    <div class = "card-header py-3">
        <h6 class= "m-0 font-weight-bold text-primary"> CONTENT MANAGEMENT
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcontent">
                Add Content
            </button>
        <h6>
    </div>

    <div class = "card-body">

    <?php
        if(isset($_SESSION['success']) && $_SESSION['success'] !='')
        {
            echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
            unset($_SESSION['success']); 
        }
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
            unset($_SESSION['status']); 
        }
    ?>
        <div class= "table-responsive">

        <?php
            $connection = mysqli_connect("localhost", "root", "", "adminpanel");

            $query = "SELECT * FROM tblcontent";
            $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>CreatedBy</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
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
                                <td> <?php echo $row['description']; ?> </td>
                                <td> <?php echo $row['date']; ?> </td>
                                <td> <?php echo $row['time']; ?> </td>
                                <td> <?php echo $row['createdby']; ?> </td>
                                <td>
                                    <form action="cms_edit.php" method="POST">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                    
                                </td>
                                <td>
                                    <form action="cmscode.php" method="POST">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
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
include('includes/footer.php');
include('includes/scripts.php');
?>
