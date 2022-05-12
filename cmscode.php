<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "adminpanel");

if(isset($_POST['addbtn']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dt1 = date('Y-m-d');
    $dt2 = date('g:i a');
    $createdBy = $_POST['createdby'];

    $query = "INSERT INTO tblcontent (title,description,date,time,createdby) VALUES ('$title','$description','$dt1','$dt2','$createdBy')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        //echo "Saved";
        $_SESSION['success'] = "Adding Content Successful";
        header('Location: cms.php');
    }
    else
    {
        $_SESSION['status'] = "Content Not Added!";
        header('Location: cms.php');
    }

}
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM tblcontent WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: cms.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header('Location: cms.php');
    }
}
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $description = $_POST['edit_description'];
    $dt1 = date('Y-m-d');
    $dt2 = date('g:i a');
    $createdBy = $_POST['edit_createdby'];

    $query = "UPDATE tblcontent SET title='$title', description='$description' , date ='$dt1', time='$dt2', createdby='$createdBy' WHERE id='$id'"; 
    $query_run = mysqli_query($connection,$query);
    
    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: cms.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: cms.php');
    }

}