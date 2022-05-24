<?php
    session_start();
    include "../dbconfig.php";
    if(!$_SESSION['username'])
    {
        header('Location: loginAdmin.php');
    }
    else{
        
        $username = $_SESSION['username'];
        $query = "SELECT *, staff.id as Staff_ID, branch.Name as Branch_Name, branch.Address as Branch_Address, departments.Name as Department_Name
            from staff 
            left join branch 
            on staff.BranchID = branch.id
            left join departments
            on staff.DepartmentId = departments.id
            where Username ='$username'";
        $query_run = mysqli_query($connection, $query);
        $user = mysqli_fetch_array($query_run);
    }
?>