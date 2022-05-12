<?php 
include('security.php');


//for json
$pursueStudy = $_POST['pursueStudy'];
$training = $_POST['training'];
$creditsEarned = $_POST['creditsEarned'];
$trainingIns = $_POST['trainingIns'];
$pursueFurther = $_POST['pursueFurther'];
$pursueOthers = $_POST['pursueOthers'];
$skills = $_POST['skills'];
$trainingIn = $_POST['trainingIn'];
$otherTraining = $_POST['otherTraining'];
$skillsandtraining = $_POST['skillsandtraining'];
$overalAll = $_POST['overalAll'];
$personalExp = $_POST['personalExp'];
$firstJob =" ";
$compare = $_POST['compare'];
$prepareOthers = $_POST['prepareOthers'];
$Award = $_POST['Award'];
$GrantingInstitution = $_POST['GrantingInstitution'];
$year = $_POST['year'];
$getJob = " ";
$acquired = " ";
$acquiredOthers = " ";
$employementStat = $_POST['employementStat'];
$currentlyEmp = $_POST['currentlyEmp'];
if($currentlyEmp == "No"){

    
    $unEmployed = $_POST['unEmployed']; 
    $typeOrg =  "";
    $otherOrg =  "";
    $presentStatus =  "";
    $presentEmployer =  "";
    $position =  "";
    $when =  "";
    $occupationClass =  "";
    $otherClass =  "";
    $compYears =  "";
    $incomeRanged =  "";
    $statisfied =  "";
    $suggestions = $_POST['suggestions'];
    $alumnisuggest = $_POST['alumnisuggest'];
    $courseRelated = " ";

}
else{
    $courseRelated = $_POST['courseRelated'];
    $unEmployed = "";
    $typeOrg = $_POST['typeOrg'];
    $otherOrg = $_POST['otherOrg'];
    $presentStatus = $_POST['presentStatus'];
    $presentEmployer = $_POST['presentEmployer'];
    $position = $_POST['position'];
    $when = $_POST['when'];
    $occupationClass = $_POST['occupationClass'];
    $otherClass = $_POST['otherClass'];
    $compYears = $_POST['compYears'];
    $incomeRanged = $_POST['incomeRanged'];
    $statisfied = $_POST['statisfied'];
    $suggestions = $_POST['suggestions'];
    $alumnisuggest = $_POST['alumnisuggest'];
}



$testSchoolID = $_POST['testSchoolID'];
$id = $_POST['id'];
// $lastname = $_POST['lastname'];
// $firstname = $_POST['firstname'];
// $middlename = $_POST['middlename'];
// $gender = $_POST['gender'];
// $status = $_POST['status'];
// $dateofbirth = $_POST['dateofbirth'];
// $emailaddress = $_POST['emailaddress'];
// $contactnumber = $_POST['contactnumber'];
// $work_contactnumber = $_POST['work_contactnumber'];
// $mailingAddress = $_POST['mailingAddress'];
// $presentAddress = $_POST['presentAddress'];
// $provincialAddress = $_POST['provincialAddress'];
// $fbUrl = $_POST['fbUrl'];
// $gmailUrl = $_POST['gmailUrl'];
// $linkedUrl = $_POST['linkedUrl'];
// $otherUrl = $_POST['otherUrl'];
$course = $_POST['course'];
// $major = $_POST['major'];
// $address = $_POST['address'];
$yeargraduated = $_POST['yeargraduated'];
// $awards = $_POST['awards'];
// $location = $_POST['location'];
// $positionWork = $_POST['positionWork'];
// $company = $_POST['company'];
// $description = $_POST['description']; 
// $employeeYear = $_POST['employeeYear'];
$schoolAttended = $_POST['schoolAttended'];
$array = [
    'id' => $id, 
    'pursueStudy' => $pursueStudy, 
    'training' => $training, 
    'creditsEarned' => $creditsEarned, 
    'trainingIns' => $trainingIns, 
    'pursueFurther' => $pursueFurther, 
    'pursueOthers' => $pursueOthers, 
    'skills' => $skills, 
    'trainingIn' => $trainingIn, 
    'otherTraining' => $otherTraining, 
    'skillsandtraining' => $skillsandtraining, 
    'overalAll' => $overalAll, 
    'personalExp' => $personalExp, 
    'compare' => $compare, 
    'prepareOthers' => $prepareOthers, 
    'Award' => $Award, 
    'GrantingInstitution' => $GrantingInstitution, 
    'year' => $year, 
    // 'address' => $address, 
    'getJob' => $getJob, 
    'acquired' => $acquired, 
    'acquiredOthers' => $acquiredOthers, 
    'employementStat' => $employementStat, 
    'currentlyEmp' => $currentlyEmp, 
    'unEmployed' => $unEmployed, 
    'typeOrg' => $typeOrg, 
    'otherOrg' => $otherOrg, 
    'presentStatus' => $presentStatus, 
    'presentEmployer' => $presentEmployer, 
    'position' => $position, 
    'when' => $when, 
    'occupationClass' => $occupationClass, 
    'otherClass' => $otherClass, 
    'compYears' => $compYears, 
    'incomeRanged' => $incomeRanged, 
    'statisfied' => $statisfied, 
    'firstJob' => $firstJob, 
    'suggestions' => $suggestions,
    'alumnisuggest' => $alumnisuggest
];
// print_r($array);
// echo json_encode($array);
$form= json_encode($array);
$insert = "INSERT INTO studentforms(Id, studID, Description, AddedDate, courseRelated, currentlyEmp)
VALUES(null,'$id','$form',now(),'$courseRelated', '$currentlyEmp')
";
$result = mysqli_query($connection, $insert);
// print_r($insert);
// $query = "SELECT * FROM studentforms WHERE stu$dID  =".$id;
// $query_run = mysqli_query($connection, $query);
// $batch = mysqli_fetch_array($query_run);
// $fetched = (json_decode($batch['Description']));
// print_r($fetched);
// echo $fetched->id; 

if(isset($_POST['yeargraduated']) || isset($_POST['course'] )){
    $sqlUpdate = "UPDATE students SET
    interest= '$testSchoolID',
    schoolAttended='$schoolAttended' ,
    courseGraduated='$course' 
    WHERE id =$id";
    $sql = $sqlUpdate;
    $result = mysqli_query($connection, $sql);
    
    //checker
    $query = "SELECT * FROM batch WHERE Name  = '$id' ";
    $batchChecker = mysqli_query($connection, $query);
    if(mysqli_num_rows($batchChecker) == 0){
        $sqlBatch = "INSERT INTO `batch`(`Id`, `Name`, `Description`, `AddedDate`) VALUES (null,$id,$yeargraduated,now())";
        $result1 = mysqli_query($connection, $sqlBatch);
    } 
    else{
        $row = mysqli_fetch_assoc($batchChecker);
        $checker = $row['Id'];
        $sqlBatch = "UPDATE `batch` SET `Description` = '$yeargraduated' WHERE `batch`.`Name` = $id";
        $result1 = mysqli_query($connection, $sqlBatch);
    }
  

    if ($result > 0){
        header("Location: home.php");
        //  echo($sql);
        //  echo json_encode($array);
        // echo "test";
    }
}
else{
    $sqlUpdate = "UPDATE students SET
    interest= '$testSchoolID',
    schoolAttended='$schoolAttended' ,
    courseGraduated='$course' 
    WHERE id =$id";
    $sql = $sqlUpdate;
    $result = mysqli_query($connection, $sql);
    if ($result > 0){
        header("Location: home.php");
        // echo($sqlUpdate);
        // echo json_encode($array);
    }
    // echo $sqlUpdate;
}
?>