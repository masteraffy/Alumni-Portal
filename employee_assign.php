<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- Data tables -->

<div class = "card shadow mb-4">
    <div class = "card-header py-3">
        <h6 class= "m-0 font-weight-bold text-primary"> 
            Employee Management
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

            $query = "SELECT * FROM register WHERE usertype = 'employee'";
            $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>School</th>
                    <th>Department</th>
                    <th>Usertype</th>
                    <th>Assign</th>
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
                                <td> <?php echo $row['username']; ?> </td>
                                <td> <?php echo $row['email']; ?> </td>
                                <td> <?php echo $row['school']; ?> </td>
                                <td> <?php echo $row['department']; ?> </td>
                                <td> <?php echo $row['usertype']; ?> </td>
                                <td>
                                    <center>
                                    <form action="employee_assigning.php" method="POST">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> Assign</button>
                                    </form>
                                    </center>
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
include('includes/scripts.php');    
include('includes/footer.php');
?>