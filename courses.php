<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <script src="courses.js"></script>
     <link rel='stylesheet' href='yearpicker.css'>
    <script src= 'addCourse.js'></script> 
    <script src= 'addSubject.js'></script> 
    <script src= 'jquery-3.5.1.js'></script>
    
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 1310px;
    empty-cells: hide;
    margin: 10px;
}
th{
    background-color: #dddddd; 
    border: 1px solid black;
    text-align: left;
    padding: 8px;
  }

td {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

tr:nth-child(odd) {
  background-color: #4CAF50;
}
</style>
</head>
<body>
    
<div id="header-text">
    <h1><strong id="top-title">Lou Geh University</strong></h1>
</div>
    <div class="topnav">
          <a href="index.html"><i class="fa fa-fw fa-home"></i>Home</a>
        <a class="active" href="courses.php">Courses</a>
  <a href="students.php">Students</a>
</div>

<div>
    <h1 class = "cLabel">Courses Offered</h1>
    
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for courses.." title="Type in a name">

<ul id="myUL">

               <?php
                $conn = mysqli_connect("localhost", "root", "", "lou_geh_db") or die(mysqli_error());
    
                $query = "Select course_id, course_name, course_code from tbl_course";
                $query_run = mysqli_query($conn, $query);
                $check= mysqli_num_rows($query_run) > 0;
                $ctr = 0;
    
                if($check)
                {
                  while($row =mysqli_fetch_array($query_run))
                {$ctr++;
                ?>   
                            <li><a href="#"><?php echo $row['course_name'];?></a></li>
                  <?php }
                 }else
                 {
                   echo '<h1>NO RECORDS YET</h1>';
                 }
                 ?>
    

</ul>
    <a href="#" id="addCourse" class="button">Add Course</a>
        <h1 class = "cLabel"><br>Subjects</h1>

    
    <table>
          <thead>
          <tr>
           <th>Course</th>
           <th>Subject</th>
           <th>Subject Code</th>
           <th>Unit</th>
           <th>Year</th>
           <th>Semester</th>
           </tr>
           </thead>
         <?php
                $conn = mysqli_connect("localhost", "root", "", "lou_geh_db") or die(mysqli_error());
    
                $query = "Select a.course_name, b.subject_name, b.subject_code, b.unit, b.year, b.semester from tbl_course a INNER JOIN 
                subjects_tbl b ON a.course_id = b.course_id ORDER BY a.course_name";
                $query_run = mysqli_query($conn, $query);
                $check= mysqli_num_rows($query_run) > 0;
                $ctr = 0;
                if($check)
                {
                  while($row =mysqli_fetch_array($query_run))
                {$ctr++;
                ?>   
        <tr><td><?php echo $row['course_name'];?></td><td><?php echo $row['subject_name'];?></td><td><?php echo $row['subject_code'];?></td>
        <td><?php echo $row['unit'];?></td><td><?php echo $row['year'];?></td><td><?php echo $row['semester'];?></td></tr>
                  <?php }
                 }else
                 {
                   echo '<h1>NO SUBJECTS YET</h1>';
                 }
                 ?>
    </table>
   <a href="#" id="addSubject" class="button">Add Subject</a>
    
</div>
    
<div class = "bg-modal">
<div class="modal-content">
<div class="modal-header">
    <div class = "close">+</div>
    <h1>Add Course</h1>
  </div>
    <div class="modal-body">
     <div class="courseName">
   <h4>Course Name:</h4>    
  <input type="text" id="courseName" name="courseName" placeholder="Enter Course Name" style="margin-left: 20px; width: 280px">
    </div>
        <div class="courseCode">         
    <h4>Course Code:</h4>    
  <input type="text" id="courseCode" name="courseCode" placeholder="Enter Course Code" style="margin-left: 25px; width: 280px">
       </div>
        <div class = "points">
            
     <h4>Credit Points:</h4>    
  <input type="number" id="creditPoints" name="creditPoints" value ="100" style="margin-left: 22px; width: 280px">
        </div>
  <div class="yearClass">
  <h4>Year:</h4>    
  <input type="number" id="year" name="year" min="2000" max="2020" value="2020" style="margin-left: 89px;">
        </div>
             <input type="submit" class="button" value="Submit" style="margin-left: 10px; margin-top: 25px; width: 430px" onclick="addCourse()">
    </div>
            
</div>
</div>
    
       <!--SUBJECT-->
<div class = "bg-modal-subj">
<div class="modal-content-subj">
<div class="modal-header-subj">
    <div class = "close-subj">+</div>
    <h1>Add Subject</h1>
  </div>
    <div class="modal-body-subj">
          <div class="courseName-subj">  
                                <h4>Select Course:</h4>  
              <div class="custom-select" style="width:200px;">

  <select id="subj" style="margin-left: 10px; height:40px; width: 300px">
      <?php
                $conn = mysqli_connect("localhost", "root", "", "lou_geh_db") or die(mysqli_error());
    
                $query = "Select * from tbl_course";
                $query_run = mysqli_query($conn, $query);
                $check= mysqli_num_rows($query_run) > 0;
                $ctr = 0;
    
                if($check)
                {
                  while($row =mysqli_fetch_array($query_run))
                {$ctr++;
                ?>   
                           <option><?php echo $row['course_name'];?></option>
                  <?php }
                 }else
                 {
                   echo '<option>NO RECORDS YET</option>';
                 }
                 ?>

      </select>
     </div>
    </div>
        <div class="subjName">         
    <h4>Subject Name:</h4>    
  <input type="text" id="subjName" name="subjName" style="margin-left: 8px; width: 292px">
       </div>
        <div class = "subjCode">
            
     <h4>Subject Code:</h4>    
  <input type="text" id="subjCode" name="subjCode" style="margin-left: 13px; width: 292px">
        </div>
        
  <div class="unit">
  <h4>Unit:</h4>    
  <input type="number" id="unit" name="unit" min="1" max="20" value="3" style="margin-left: 81px; width: 70px;  margin-right: 20px;">
  </div>        
  <div class="subjYear">
  <h4>Year:</h4>    
  <input type="number" id="subYear" name="subYear" min="1" max="4" value="1" style="margin-left: 10px; ">
        </div>
        <div class="semester">
  <h4>Semester:</h4>    
  <input type="number" id="sem" name="sem" min="1" max="2" value="1" style="margin-left: 46px; width: 70px;">
        </div>
            <input type="submit" class="button" value="Submit" style="margin-left: 10px; margin-top: 25px; width: 430px" onclick="addSubject()">       
    </div>
            
</div>
</div>
           
    
    
    
    <script>
        document.getElementById('addCourse').addEventListener('click', 
        function(){
       document.querySelector('.bg-modal').style.display = 'flex';
        });
        document.querySelector('.close').addEventListener('click',
        function(){
            document.querySelector('.bg-modal').style.display = 'none';
        })
        
        document.getElementById('addSubject').addEventListener('click', 
        function(){
       document.querySelector('.bg-modal-subj').style.display = 'flex';
        });
         document.querySelector('.close-subj').addEventListener('click',
        function(){
            document.querySelector('.bg-modal-subj').style.display = 'none';
        })
        
        
    </script>
</body>
</html>
