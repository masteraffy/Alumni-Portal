
<?php
$regexStudent = "/^[\d]{2}[\-][\d]{5}$/";
$regexAlumni = "/^[\d]{2}[\-][\d]{4}$/";
    if(isset($_POST['submit']))
    {
        if(!preg_match($regexAlumni, $_POST['text']))
        {
            $output = "<span style='color:green'> Check </span>";
        }
        else
        {
            $output = "<span style='color:red'> Wrong </span>";
        }
    }
?>

<form method="POST">
    <input type="text" name="text" autofocus/>
    <input type="submit" name="submit">
</form>

<?php 
if(isset($output))
{
    echo $output;
}
?>