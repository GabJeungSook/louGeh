<?php
     $conn = mysqli_connect("localhost", "root", "", "lou_geh_db"); # DATABASE
    
      if($conn -> connect_errno > 0)
    {
        die("Unable to connect to database [".$conn -> connect-error."]");
    }else
      {
        session_start();
         $course = $_POST['course'];
         $studentName =  $_POST['studentName'];
         $studentLastName = $_POST['studentLastName'];
         $birthday = $_POST['birthday'];
         $year = $_POST['years'];
         $sem = $_POST['sems'];
          
         $query_addCourse = "INSERT INTO tbl_students(course_id, student_name, student_lastName, birthday, year, sem)
                                VALUES((SELECT course_id FROM tbl_course WHERE course_name ='$course'), '$studentName', '$studentLastName', '$birthday', '$year', '$sem')"; 
          mysqli_query($conn, $query_addCourse);
      }
?>