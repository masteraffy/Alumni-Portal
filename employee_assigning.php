<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container-fluid">
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Department Assigning </h6>
        </div>
        <div class="card-body"> 
            <?php
                $connection = mysqli_connect("localhost","root","","adminpanel");
                if(isset($_POST['edit_btn']))
                {
                    $id = $_POST['edit_id'];
            
                        $query = "SELECT * FROM register WHERE id='$id'";
                        $query_run = mysqli_query($connection, $query);

                        foreach($query_run as $row)
                        {
                            ?>                           
                            <form action="code.php" method="POST">      
                                <input type="hidden" name="edit_id" value = "<?php echo $row['id']?>">                                    
                                    <div class="form-group">
                                        <label>School:</label>
                                        <select name="school" class="form-control">
                                            <option>Select School</option>
                                            <option value="Juan Sumulong Campus"> Juan Sumulong Campus </option>
                                            <option value="Plaridel Campus"> Plaridel Campus </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label>Branch:</label>
                                        <span class="form-control" name="branch">Branch</span>
                                        
                                    </div>
                                    <a href = "register.php" class="btn btn-danger">CANCEL </a>
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

<?php 
include('includes/scripts.php');    
?>