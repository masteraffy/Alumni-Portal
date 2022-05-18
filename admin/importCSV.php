<?php
include "../dbconfig.php";
include('security.php');

// Allowed mime types
$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
//choose file
$count=0;
$errorCountEmpty=0;
$errorCountRegex=0;
$regexStudent = "/^[\d]{2}[\-][\d]{5}$/";
$regexAlumni = "/^[\d]{2}[\-][\d]{4}$/";
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['uploadfile']['name']) && in_array($_FILES['uploadfile']['type'], $csvMimes))
    {
        // If the file is uploaded
        if(is_uploaded_file($_FILES['uploadfile']['tmp_name']))
        {
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['uploadfile']['tmp_name'], 'r');
            
             // Skip the first line
             fgetcsv($csvFile);
             //while loop to get the row data
             while(($line = fgetcsv($csvFile)) !== FALSE)
             {
                 //get row data by the variable $line
                 $alumni_id = $line[0];
                 $stud_id = $line[1];
                 $f_name = $line[2];
                 $m_name = $line[3];
                 $l_name = $line[4];
                 $email = $line[5];
                 $campus = $line[6];
                 $course = $line[7];
                 $batch = $line[8];
                 $phone = $line[9];
                 $address = $line[10];
                 $studDate = $line[11];
                 $studStatus = $line[12];
                 $studDes = $line[13];
                 $studOR = $line[14];

                if(!empty($alumni_id) && !empty($stud_id))
                {
                    if(preg_match($regexAlumni, $alumni_id) && preg_match($regexStudent, $stud_id))
                    {
                        
                        $query_insert = "INSERT INTO exceltest (id, alumni_id, stud_no, f_name, m_name, l_name, email, campus, course, batch, phone, address, studDate, studStatus, studDes,studOR) VALUES (null, '".$alumni_id."', '".$stud_id. "', '".$f_name."', '".$m_name."', '".$l_name."', '".$email."', '".$campus."', '".$course."', '".$batch."', '".$phone."', '".$address."', '".$studDate."', '".$studStatus."', '".$studDes."', '".$studOR."')";

                        if($connection->query($query_insert) === TRUE)
                        {
                            echo "Recorded";
                            $count++;
                        }
                        else
                        {
                            echo "Error: " .$query_insert. "<br>" . $connection->error;
                        }
                    }
                    else
                    {
                        $errorCountRegex++;
                    }
                }
                else
                {
                    $errorCountEmpty++;
                }

            }

            echo "<br>Regex Error: " .$errorCountRegex++;
            echo "<br>Empty Field Error: " .$errorCountEmpty++; 

        }
    }
    else
    {
       
    }


    /*
                 $query_insert = "INSERT INTO exceltest (id, alumni_id, stud_no, f_name, m_name, l_name, email, campus, course, batch, phone, address, studDate, studStatus, studDes,studOR) VALUES (null, '".$alumni_id."', '".$stud_id. "', '".$f_name."', '".$m_name."', '".$l_name."', '".$email."', '".$campus."', '".$course."', '".$batch."', '".$phone."', '".$address."', '".$studDate."', '".$studStatus."', '".$studDes."', '".$studOR."')";

                    if($connection->query($query_insert) === TRUE)
                    {
                        echo "Recorded";
                        $count++;
                    }
                    else
                    {
                        echo "Error: " .$query_insert. "<br>" . $connection->error;
                    }
                */

?>