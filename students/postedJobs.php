<?php
  include('security.php');
  include "../dbconfig.php";
  $email = $_SESSION['email'];
  $query = "SELECT * FROM students WHERE email  = '$email' ";
  $query_run = mysqli_query($connection, $query);
  $user = mysqli_fetch_array($query_run);
  $id = $user["id"];
  $query = "SELECT * FROM batch WHERE Name  =".$id;
  $query_run = mysqli_query($connection, $query);
  $batch = mysqli_fetch_array($query_run);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hello! <?php echo $user["firstname"]; ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body>
<div class="wrapper">

<?php include("header.php"); ?>
<main style="padding: 20px 0!important;">
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-lg-4 col-md-4 pd-left-none no-pd">
<div class="main-left-sidebar no-margin">
<div class="user-data full-width">
<div class="user-profile">
</div>
<h2 class="mt-2 mb-2">Job Opening</h2>
<ul class="user-fw-status">
<li>
<div style="text-align:center; padding-left:0px;">
    <?php
        $courseID = $user['courseGraduated'];
        $query = "SELECT *
        FROM events
        WHERE TypeOfContent ='Jobs'
        AND course =".$courseID."
        ORDER by CreatedDate DESC;";
        $content = mysqli_query($connection, $query);
        if(mysqli_num_rows($content) > 0)
        {
            while($row = mysqli_fetch_assoc($content))
            {
    ?>
        <div class="jobs-list p-0" style="border-bottom: 1px solid #eee;  text-align: left !important;">
            <div class="job-info">
                <div class="job-details p-2 w-100">
                    <h3>Title: <?php echo $row['Title'];?></h3>
                    <p>Subtitle: <?php echo $row['Subtitle'] ?></p>
                    <a href="#" data-id="<?php echo $row['id'] ?>" class="showJobs" style="float:right; color:#4889eb;">See more..</a>
                </div>
            </div>
        </div>
        
<?php
        }
    }
    else{
        echo "<i><small>0 Job Posted</small></i>";
    }
?>
</div>
</li>
</ul>
</div>

<div class="">
<ul>

<div class="cp-sec">
<!-- <p><img src="images/cp.png" alt="">Copyright Alumni Service and 2022</p> -->
</div>
</div>
</div>
</div>
<div class="col-lg-8 col-md-8 no-pd">
<div class="main-ws-sec">
<div class="">
</div>
</div>
<div class="posts-section">
<?php
    $query = "SELECT *
    FROM events
    WHERE TypeOfContent ='Jobs'
    AND course =".$courseID."
    ORDER by CreatedDate DESC;";
    $content = mysqli_query($connection, $query);
    if(mysqli_num_rows($content) > 0)
    {
        while($row = mysqli_fetch_assoc($content))
        {
?>
            
            <div class="post-bar d-none" id="<?php echo "show_".$row['id'] ?>">
                <div class="post_topbar">
                    <div class="usy-dt">
                    <img src="images/resources/us-pic.png" alt="">
                        <div class="usy-name">
                            <h3> 
                                <?php echo $row['Title'] ?>
                            </h3>
                            <span><img src="images/clock.png" alt="">
                                <?php 
                                    $date = date_create($row['CreatedDate']);
                                    echo date_format($date,"M d, Y | h:i:s A");
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="job_descp">
                    <br/>
                    <p>
                     <?php echo $row['Subtitle'] ?>
                    </p>
                    <p>
                      <?php echo $row['Description'] ?>
                    </p>
                    <?php 
                    if($row['UserType']=="Alumni"){
                        $pathPhoto = "/alumni/students/".$row['Image'];
                    } 
                    else{
                        $pathPhoto = "/alumni/admin/".$row['Image'];

                    }
                    if (!str_contains($row['Image'], 'empty')) { 
                           
                        ?>
                    <img src="<?php echo $pathPhoto;  ?>" />
                    <?php 
                    }
                    $url = "postJobsolo.php?id=".$row['id'];
                    ?>
                </div>
                    <a style="float: right;" href="<?php echo $url; ?>">Open</a>
            </div>
<?php
        }
    }
?>    




</div>
</div>
</div>
<div class="post-popup pst-pj">
<div class="post-project">
<div class="post-project-fields">


</div>
<a href="#" title="">x</a>
</div>
</div>
<div class="post-popup job_post">
<div class="post-project">
<h3>Whats on Your Mind?</h3>
<div class="post-project-fields">

<form action="code.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
            <input type="text" name="id" placeholder="Title" value="<?php echo $user['id'];?>" >
        </div>
        <div class="col-lg-12">
            <input type="text" name="title" placeholder="Title">
        </div>
        <div class="col-lg-12">
            <input type="text" name="Subtitle" placeholder="Subtitle">
        </div>
        <div class="col-lg-12">
            <textarea name="description" placeholder="Description"></textarea>
        </div>
        <div class="col-lg-12">
            <label>Image :</label>    
            <br/>             
            <input type="file" name="file" />

        </div>
        <div class="col-lg-12">
            <ul>
            <li>
                <button type="submit" name="postContent" class="active"> Yes</button>
            </li>
            <li><a href="#" title="">Cancel</a></li>
            </ul>
        </div>
    </div>
</form>
</div>
<a href="#" title="">x</a>
</div>
</div>
<div class="chatbox-list">
<div class="chatbox">

<div class="conversation-box">
<div class="con-title mg-3">
<div class="chat-user-info">
<img src="images/resources/us-img1.png" alt="">
<h3>John Doe <span class="status-info"></span></h3>
</div>
<div class="st-icons">
<a href="#" title=""><i class="la la-cog"></i></a>
<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
</div>
</div>
<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
<div class="chat-msg">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
<span>Sat, Aug 23, 1:10 PM</span>
</div>
<div class="date-nd">
<span>Sunday, August 24</span>
</div>
<div class="chat-msg st2">
<p>Cras ultricies ligula.</p>
<span>5 minutes ago</span>
</div>
<div class="chat-msg">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
<span>Sat, Aug 23, 1:10 PM</span>
</div>
</div>
<div class="typing-msg">
<form>
<textarea placeholder="Type a message here"></textarea>
<button type="submit"><i class="fa fa-send"></i></button>
</form>
<ul class="ft-options">
<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
<li><a href="#" title=""><i class="la la-camera"></i></a></li>
<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
</ul>
</div>
</div>
</div>
<div class="chatbox">

<div class="conversation-box">
<div class="con-title mg-3">
<div class="chat-user-info">
<img src="images/resources/us-img1.png" alt="">
<h3>John Doe <span class="status-info"></span></h3>
</div>
<div class="st-icons">
<a href="#" title=""><i class="la la-cog"></i></a>
<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
</div>
</div>
<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
<div class="chat-msg">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
<span>Sat, Aug 23, 1:10 PM</span>
</div>
<div class="date-nd">
<span>Sunday, August 24</span>
</div>
<div class="chat-msg st2">
<p>Cras ultricies ligula.</p>
<span>5 minutes ago</span>
</div>
<div class="chat-msg">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
<span>Sat, Aug 23, 1:10 PM</span>
</div>
</div>
<div class="typing-msg">
<form>
<textarea placeholder="Type a message here"></textarea>
<button type="submit"><i class="fa fa-send"></i></button>
</form>
<ul class="ft-options">
<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
<li><a href="#" title=""><i class="la la-camera"></i></a></li>
<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
</ul>
</div>
</div>
</div>

</div>
</div>
     <!-- Modal -->
     <div class="modal fade mt-5" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-body p-3">
                        <h1 class="p-2 mb-2" style="font-size: 20pt !important;">Are you sure you want to Signout?</h1>
                        
                            <a href="logout.php" class="btn btn-danger" >Yes</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </div>
                    </div>
                </div>
            </div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script>
    $(document).ready(function(){
        $(".showJobs").click(function(){
            id=$(this).data("id");
            $(".post-bar").addClass('d-none');
            $("#show_"+id).removeClass('d-none');
        });
    });
    </script>
</body>
</html>