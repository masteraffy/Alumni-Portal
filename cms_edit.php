<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT CONTENT MANAGEMENT </h6>
        </div>
        <div class="card-body"> 

            <?php
                $columnname = "username";
                $connection = mysqli_connect("localhost", "root", "", "adminpanel");
                $query1 = "SELECT * FROM register";
                $display = mysqli_query($connection, $query1);
                if(isset($_POST['edit_btn']))
                {
                        $id = $_POST['edit_id'];
            
                        $query = "SELECT * FROM tblcontent WHERE id='$id'";
                        $query_run = mysqli_query($connection, $query);

                        foreach($query_run as $row)
                        {
                            ?>                      
                            <form action="cmscode.php" method="POST">      
                                <input type="hidden" name="edit_id" value = "<?php echo $row['id']?>">
                                    <div class="form-group">
                                        <label>Title:</label>
                                        <input type ="text" name="edit_title" value = "<?php echo $row['title']?>" class="form-control" placeholder="Enter Title">
                                    </div>
                                    <div class="mb-3">
                                        <label>Description:</label>
                                        <input type ="textarea" name="edit_description" value = "<?php echo $row['description']?>" class="form-control" placeholder="Enter Title" rows="10">
                                    </div>
                                    <div class="form-group">
                                        <label>CreatedBy</label>
                                        <select name="edit_createdby" class="form-control">
                                            <?php
                                                if($display)
                                                {
                                                    while($row = mysqli_fetch_array($display))
                                                    {
                                                        $stname = $row["$columnname"];
                                                        
                                                            echo"<option> $stname<br></option>";
                                                        
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <a href = "cms.php" class="btn btn-danger">CANCEL </a>
                                    <button type= "submit" name="updatebtn" class= "btn btn-primary"> Update </button>
                            </form> 
                            <?php
                        }
                }
            ?>
                </div>
        </div>
    </div>
    </div>
</div>

<?php 
include('includes/scripts.php');    

?>