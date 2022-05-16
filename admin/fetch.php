<?php
include('../includes/header.php');
include "../dbconfig.php";

    if(isset($_POST['request'])){
        
        $request = $_POST['request'];

        $query = "SELECT *, events.id as Event_ID FROM events left join students on events.CreatedUser = students.id where UserType='Alumni' AND AllowPost='$request'";
        $query_run = mysqli_query($connection, $query);
    }
?>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered dataTableASC" id="dataTable" width="100%" cellspacing="0">

            <thead>
                <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Description</th>
                    <th>Posted By</th>
                    <th>Date and Time Posted</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th hidden> </th>
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
                                <td hidden> <?php echo $row['Event_ID']; ?> </td>
                                <td> <?php echo $row['Title']; ?> </td>
                                <td> <?php echo $row['Subtitle']; ?> </td>
                                <td> <?php echo $row['Description']; ?> </td>
                                <td> <?php echo $row['studNo'] . " | " . $row['firstname'] . " " . $row['middleName'] ." ". $row['lastname']; ?> </td>
                                <td> <?php echo $row['CreatedDate']; ?> </td>
                                <td> <?php echo $row['AllowPost']; ?> </td>
                                
                                <td>
                                    
                                    <button type="button" class="btn btn-success check " data-toggle="modal" data-target="#approvemodal" data-id="<?php echo $row['id']; ?>"> 
                                    <i class="fas fa-check"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#deletemodal" data-id="<?php echo $row['id']; ?>"> 
                                    <i class="fas fa-ban"></i>
                                    </button>
                                    <!-- Modal -->
                                    <!--Approve Alert Modal-->
                                    <div class="modal fade" id="approvemodal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmModalLabel">Approve</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to Approve?</h5>
                                            
                                            <form action="code.php" method="POST">
                                                <input type="hidden" id="updateContent" name="update_id" value="<?php echo $row['Event_ID']; ?>">
                                                <button type="submit" name="updateContent" class="btn btn-success"> Yes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Delete Alert Modal-->
                                    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmModalLabel">Disapprove</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to Disapprove?</h5>
                                            
                                            <form action="code.php" method="POST">
                                                <input type="hidden" id="delete_id" name="disapprove_id" value="<?php echo $row['Event_ID']; ?>">
                                                <button type="submit" name="disapproveContent" class="btn btn-danger"> Yes</button>
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

<script>
    
</script>

<?php
include('../includes/scripts.php');    

?>