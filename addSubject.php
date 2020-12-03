<?php
     $conn = mysqli_connect("localhost", "root", "", "lou_geh_db"); # DATABASE
    
      if($conn -> connect_errno > 0)
    {
        die("Unable to connect to database [".$conn -> connect-error."]");
    }else
      {
        session_start();
         $courseName = $_POST['courseName'];
         $subjName =  $_POST['subjName'];
         $subjCode = $_POST['subjCode'];
         $unit = $_POST['unit'];
         $year = $_POST['year'];
         $sem = $_POST['sem'];
          
         $query_addCourse = "INSERT INTO subjects_tbl(course_id, subject_name, subject_code, unit, year, semester)
                                VALUES((SELECT  course_id FROM tbl_course WHERE course_name ='$courseName'), '$subjName', '$subjCode', '$unit', '$year', '$sem')"; 
          mysqli_query($conn, $query_addCourse);
      }
?>