<?php
     $conn = mysqli_connect("localhost", "root", "", "lou_geh_db"); # DATABASE
    
      if($conn -> connect_errno > 0)
    {
        die("Unable to connect to database [".$conn -> connect-error."]");
    }else
      {
        session_start();
         $courseName = $_POST['courseName'];
         $courseCode =  $_POST['courseCode'];
         $points = $_POST['points'];
         $year = $_POST['year'];
          
         $query_addCourse = "INSERT INTO tbl_course(course_code, course_name, credit_points,year)
                                VALUES('$courseCode', '$courseName', '$points', '$year')"; 
          mysqli_query($conn, $query_addCourse);
      }
?>